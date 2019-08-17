<?php

class Dashboard_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Creates automatically a useplan
     *
     * @param array $data The data
     */
    public function create($data)
    {
        // add trailing 0
        if (strlen($data['date']) < 4) {
            $data['date'] = "0" . $data['date'];
        }

        // insert in useplan
        $insertUseplan = array(
            'useplan_train_nr' => $data['train_nr'],
            'useplan_date' => $data['date']
        );
        $this->db->insert('useplan', $insertUseplan);

        $lastInsertedUseplanID = $this->db->select(
            'SELECT
                useplan_id
            FROM
                `useplan`
            ORDER BY
                useplan_id DESC LIMIT 1'
        );

        // insert in useplan_to_employee
        $insertLok = array(
            'useplan_id' => $lastInsertedUseplanID[0]['useplan_id'],
            'employee_id' => $data['lok']
        );
        $this->db->insert('useplan_to_employee', $insertLok);
        
        // insert in useplan_to_employee
        $insertKont = array(
            'useplan_id' => $lastInsertedUseplanID[0]['useplan_id'],
            'employee_id' => $data['kont']
        );
        $this->db->insert('useplan_to_employee', $insertKont);
        
        // insert in useplan_to_line
        $insertLine = array(
            'useplan_id' => $lastInsertedUseplanID[0]['useplan_id'],
            'line_id' => $data['line']
        );
        $this->db->insert('useplan_to_line', $insertLine);
        
        // insert in useplan_to_rollmaterial
        $insertLocomotive = array(
            'useplan_id' => $lastInsertedUseplanID[0]['useplan_id'],
            'rollmaterial_id' => $data['locomotive']
        );
        $this->db->insert('useplan_to_rollmaterial', $insertLocomotive);

        // insert in useplan_to_rollmaterial
        for ($i = 0; $i < count($data['waggons']); $i++) {
            $insertRollmaterial = array(
                'useplan_id' => $lastInsertedUseplanID[0]['useplan_id'],
                'rollmaterial_id' => $data['waggons'][$i]
            );
            $this->db->insert('useplan_to_rollmaterial', $insertRollmaterial);
        }
    }

    /**
     * Save edited data
     *
     * @param array $data The data
     */
    public function editSave($data)
    {
        // add trailing 0
        if (strlen($data['date']) < 4) {
            $data['date'] = "0" . $data['date'];
        }

        // update useplan
        $updateUseplan = array(
            'useplan_train_nr' => $data['train_nr'],
            'useplan_date' => $data['date']
        );
        $this->db->update('useplan', $updateUseplan, "useplan_id={$data['useplan_id']}");

        // update useplan_to_employee
        $updateLok = array(
            'employee_id' => $data['lok']
        );
        $this->db->update('useplan_to_employee', $updateLok, "useplan_id={$data['useplan_id']} AND employee_id={$data['currentLok']}");
        
        // update useplan_to_employee
        $updateKont = array(
            'employee_id' => $data['kont']
        );
        $this->db->update('useplan_to_employee', $updateKont, "useplan_id={$data['useplan_id']} AND employee_id={$data['currentKont']}");
        
        // update useplan_to_line
        $updateLine = array(
            'line_id' => $data['line']
        );
        $this->db->update('useplan_to_line', $updateLine, "useplan_id={$data['useplan_id']} AND line_id={$data['currentLine']}");
        
        // update useplan_to_rollmaterial
        $updateLocomotive = array(
            'rollmaterial_id' => $data['locomotive']
        );
        $this->db->update('useplan_to_rollmaterial', $updateLocomotive, "useplan_id={$data['useplan_id']} AND rollmaterial_id={$data['currentLocomotive']}");

        // delete all relations
        for ($i=0; $i<count($data['currentWaggons']); $i++) {
            // delete from useplan_to_rollmaterial
            $this->db->delete('useplan_to_rollmaterial', "useplan_id={$data['useplan_id']} AND rollmaterial_id={$data['currentWaggons'][$i]}");
        }

        // insert in useplan_to_rollmaterial
        for ($i = 0; $i < count($data['waggons']); $i++) {
            $insertRollmaterial = array(
                'useplan_id' => $data['useplan_id'],
                'rollmaterial_id' => $data['waggons'][$i]
            );
            $this->db->insert('useplan_to_rollmaterial', $insertRollmaterial);
        }
    }

    /**
     * Deletes the affected useplan and its relations
     *
     * @param int $id The affected id
     */
    public function delete($id)
    {
        // delete from useplan
        $this->db->delete('useplan', "useplan_id = '$id'");
        
        // delete from useplan_to_employee
        $this->db->delete('useplan_to_employee', "useplan_id = '$id'", 1000);
        
        // delete from useplan_to_line
        $this->db->delete('useplan_to_line', "useplan_id = '$id'");
        
        // delete from useplan_to_rollmaterial
        $this->db->delete('useplan_to_rollmaterial', "useplan_id = '$id'", 1000);
    }

    /**
     * check if useplan exists
     *
     * @param int $employeeID The affected employee id
     * @param int $date The affected date
     * 
     * @return bool row count
     */
    public function checkUseplan($employeeID, $date)
    {
        return $this->db->select(
            'SELECT
                ute.useplan_id
            FROM
                useplan AS up
                LEFT JOIN useplan_to_employee AS ute ON (ute.useplan_id = up.useplan_id)
                LEFT JOIN employee AS e ON (e.employee_id = ute.employee_id)
            WHERE
                e.employee_id = :employeeID AND
                up.useplan_date = :date',
            array(
                ':employeeID' => $employeeID,
                ':date' => $date
            )
        );
    }

    /**
     * Get lines
     */
    public function getLines()
    {
        return $this->db->select(
            'SELECT
                line_id,
                line_name
            FROM
                line
            WHERE
                line_id > 1'
        );
    }
    
    /**
     * Get useplan data
     * 
     * @return array useplan data
     */
    public function getUseplanData($id)
    {
        $arr = array();

        $stmt = $this->db->prepare(
            'SELECT
            u.useplan_train_nr AS useplan_train_nr,
            u.useplan_date AS useplan_date,
            e.employee_id AS employee_id,
            e.category AS category,
            r.rollmaterial_id AS rollmaterial_id,
            r.number AS `number`,
            l.line_id AS line_id
            FROM
                `useplan` AS u
                LEFT JOIN useplan_to_employee AS ute ON (ute.useplan_id = u.useplan_id)
                LEFT JOIN employee AS e ON (ute.employee_id = e.employee_id)
                LEFT JOIN useplan_to_rollmaterial AS utr ON (u.useplan_id = utr.useplan_id)
                LEFT JOIN rollmaterial AS r ON (r.rollmaterial_id = utr.rollmaterial_id)
                LEFT JOIN useplan_to_line AS utl ON (utl.useplan_id = u.useplan_id)
                LEFT JOIN `line` AS l ON (l.line_id = utl.line_id)
            WHERE
                u.useplan_id = :useplanID
            ORDER BY
                u.useplan_date, u.useplan_id, r.number'
        );

        $stmt->execute(array('useplanID' => $id));

        // set data in array
        while ($row = $stmt->fetch()) {
            $arr['useplan_train_nr'] = $row['useplan_train_nr'];
            $arr['useplan_date'] = $row['useplan_date'];
            if ($row['category'] == 1) {
                $arr['lok']['employee_id'] = $row['employee_id'];
            } else {
                $arr['kont']['employee_id'] = $row['employee_id'];
            }
            if (substr($row['number'], 0, 1) == 'L') {
                $arr['lok']['number'] = $row['number'];
                $arr['lok']['lok_id'] = $row['rollmaterial_id'];
            } else {
                $arr['waggons'][$row['number']] = $row['number'];
                $arr['waggons']['id'][] = $row['rollmaterial_id'];
            }
            $arr['line_id'] = $row['line_id'];
        }

        return $arr;
    }
    
    /**
     * Insert data in useplan
     * 
     * @param int $lineID The affected line id
     * @param int $date The affected date
     * @param int $trainNr The affected train number
     */
    public function insertUseplan($date, $trainNr)
    {
        // add trailing 0
        if (strlen($date) < 4) {
            $date = "0" . $date;
        }
        $insertArray = array(
            'useplan_date' => $date,
            'useplan_train_nr' => $trainNr
        );

        $this->db->insert('useplan', $insertArray);
    }

    /**
     * Get last inserted useplan id
     */
    public function getLastUseplanID()
    {
        return $this->db->select(
            'SELECT
                useplan_id
            FROM
                useplan
            ORDER BY
                useplan_id DESC
            LIMIT 1'
        );
    }

    /**
     * Insert data in useplan_to_line
     * 
     * @param int $lineID The affected line id
     * @param int $useplanID The affected useplan id
     */
    public function insertUseplanToLine($lineID, $useplanID)
    {
        $insertArray = array(
            'line_id' => $lineID,
            'useplan_id' => $useplanID
        );

        $this->db->insert('useplan_to_line', $insertArray);
    }

    /**
     * Get employees
     * 
     * @param int $employeeID The affected id
     * @param int $category The affected category
     * 
     * @return array of employee data
     */
    public function getEmployees($employeeID = null, $category = null)
    {
        if ($employeeID) {
            return $this->db->select(
                'SELECT
                    employee_id,
                    firstname,
                    lastname
                FROM
                    employee
                WHERE
                    employee_id != :employeeID AND
                    category != 3 AND
                    category != :cat AND
                    absence = 1',
                array(
                    ':employeeID' => $employeeID,
                    ':cat' => $category
                )
            );
        } else {
            return $this->db->select(
                'SELECT
                    employee_id,
                    firstname,
                    lastname
                FROM
                    employee
                WHERE
                    category = :cat',
                array(
                    ':cat' => $category
                )
            );
        }
    }
    
    /**
     * Insert the useplan to employee relation
     * 
     * @param int $useplanID The affected useplan id
     * @param int $employeeID The affected employee id
     */
    public function insertUseplanToEmployee($useplanID, $employeeID)
    {
        $insertEmployee = array(
            'useplan_id' => $useplanID,
            'employee_id' => $employeeID
        );

        $this->db->insert('useplan_to_employee', $insertEmployee);
    }

    /**
     * Get rollmaterials
     * 
     * @param int $type The affected type
     * @param int $class The affected class
     * 
     * @return array rollmaterial data
     */
    public function getRollmaterials($type, $class = null)
    {
        if ($class) {
            return $this->db->select(
                'SELECT
                    rollmaterial_id,
                    `number`
                FROM
                    rollmaterial
                WHERE
                    `type` = :type AND
                    class = :class AND
                    `availability` = 1',
                array(
                    ':type' => $type,
                    ':class' => $class
                )
            );
        } else {
            return $this->db->select(
                'SELECT
                    rollmaterial_id,
                    `number`
                FROM
                    rollmaterial
                WHERE
                    `type` = :type AND
                    `availability` = 1',
                array(
                    ':type' => $type
                )
            );
        }
    }

    /**
     * Insert useplan to rollmaterial relation
     * 
     * @param int $type The affected type
     * @param int $class The affected class
     *
     */
    public function insertUseplanToRollmaterial($useplanID, $waggonID)
    {
        $insertArray = array(
            'useplan_id' => $useplanID,
            'rollmaterial_id' => $waggonID,
        );

        $this->db->insert('useplan_to_rollmaterial', $insertArray);
    }

    /**
     * Get useplan details
     * 
     * @param int $date The affected date
     * 
     * @return array train data
     */
    public function getTrainNr($date)
    {
        return $this->db->select(
            'SELECT
                useplan_train_nr
            FROM
                `useplan`
            WHERE
                useplan_date = :useplanDate',
            array(
                ':useplanDate' => $date
            )
        );
    }
    
    /**
     * Get line data
     * 
     * @param int $date The affected date
     * 
     * @return array line data
     */
    public function getLine($date)
    {
        return $this->db->select(
            'SELECT
            l.line_name
            FROM
                useplan AS up
                LEFT JOIN useplan_to_line AS utl ON (utl.useplan_id = up.useplan_id)
                LEFT JOIN line AS l ON (l.line_id = utl.line_id)
            WHERE
                up.useplan_date = :useplanDate',
            array(
                ':useplanDate' => $date
            )
        );
    }
    
    /**
     * Get employees
     * 
     * @param int $date The affected date
     * @param boolean $loc The category locomotive or waggons
     * 
     * @return array employees data
     */
    public function getTheEmployees($date, $loc = false)
    {
        if ($loc) {
            $cat = 1;
        } else {
            $cat = 2;
        }
        return $this->db->select(
            'SELECT DISTINCT
            e.firstname,
            e.lastname
        FROM
            useplan AS up
            LEFT JOIN useplan_to_employee AS ute ON (ute.useplan_id = up.useplan_id)
            LEFT JOIN employee AS e ON (e.employee_id = ute.employee_id)
        WHERE
            up.useplan_date = :useplanDate AND
            e.category = :cat',
            array(
                ':useplanDate' => $date,
                ':cat' => $cat
            )
        );
    }
    
    /**
     * Get train details
     * 
     * @param int $date The affected date
     * @param int $employeeID The affected id
     * 
     * @return array train data
     */
    public function getTrain($date, $employeeID)
    {
        return $this->db->select(
            'SELECT
            r.number
        FROM
            useplan AS up
            LEFT JOIN useplan_to_rollmaterial AS utr ON (utr.useplan_id = up.useplan_id)
            LEFT JOIN rollmaterial AS r ON (r.rollmaterial_id = utr.rollmaterial_id)
            LEFT JOIN useplan_to_employee AS ute ON (ute.useplan_id = up.useplan_id)
            LEFT JOIN employee AS e ON (e.employee_id = ute.employee_id)
        WHERE
            up.useplan_date = :useplanDate AND
            e.employee_id = :employeeID
        ORDER BY
            r.type',
            array(
                ':useplanDate' => $date,
                ':employeeID' => $employeeID
            )
        );
    }

    /**
     * Get train details
     * 
     * @return array useplan data
     */
    public function getUseplans()
    {
        $arr = array();

        $stmt = $this->db->prepare(
            'SELECT
                u.useplan_id AS useplan_id,
                u.useplan_train_nr AS useplan_train_nr,
                u.useplan_date AS useplan_date,
                e.firstname AS firstname,
                e.lastname AS lastname,
                e.category AS category,
                r.number AS `number`,
                l.line_name AS line_name
            FROM
                `useplan` AS u
                LEFT JOIN useplan_to_employee AS ute ON (ute.useplan_id = u.useplan_id)
                LEFT JOIN employee AS e ON (ute.employee_id = e.employee_id)
                LEFT JOIN useplan_to_rollmaterial AS utr ON (u.useplan_id = utr.useplan_id)
                LEFT JOIN rollmaterial AS r ON (r.rollmaterial_id = utr.rollmaterial_id)
                LEFT JOIN useplan_to_line AS utl ON (utl.useplan_id = u.useplan_id)
                LEFT JOIN `line` AS l ON (l.line_id = utl.line_id)
            ORDER BY
                u.useplan_date, `number`'
        );

        $stmt->execute();

        // set data in array
        while ($row = $stmt->fetch()) {
            $arr[$row['useplan_id']]['useplan_train_nr'] = $row['useplan_train_nr'];
            $arr[$row['useplan_id']]['useplan_date'] = $row['useplan_date'];
            if ($row['category'] == 1) {
                $arr[$row['useplan_id']]['lok']['firstname'] = $row['firstname'];
                $arr[$row['useplan_id']]['lok']['lastname'] = $row['lastname'];
            } else {
                $arr[$row['useplan_id']]['kont']['firstname'] = $row['firstname'];
                $arr[$row['useplan_id']]['kont']['lastname'] = $row['lastname'];
            }
            if (strtoupper(substr($row['number'], 0, 1)) == 'L') {
                $arr[$row['useplan_id']]['lok']['number'] = $row['number'];
            } else {
                $arr[$row['useplan_id']]['waggons'][$row['number']] = $row['number'];
            }
            $arr[$row['useplan_id']]['line_name'] = $row['line_name'];
        }

        return $arr;
    }
} 