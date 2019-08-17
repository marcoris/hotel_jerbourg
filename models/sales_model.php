<?php

class Sales_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Shows the list of users
     *
     * @return array The users list
     */
    public function employeeList()
    {
        return $this->db->select(
            'SELECT
                employee_id,
                personalnumber,
                firstname,
                lastname,
                absence,
                `role`,
                category,
                salutation,
                `login`
            FROM
                employee'
        );
    }
    
    /**
     * Creates a user
     *
     * @param array $data The data
     */
    public function create($data)
    {
        $insertArray = array(
            'personalnumber' => $data['personalnumber'],
            'salutation' => $data['salutation'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'category' => $data['category'],
            'absence' => $data['absence'],
            'login' => $data['login'],
            'password' => Hash::create($data['password']),
            'role' => $data['role']
        );

        $this->db->insert('employee', $insertArray);
    }

    /**
     * Shows the affected user to edit
     *
     * @param int $id The id of the affected user
     * 
     * @return array employee data
     */
    public function edit($id)
    {
        return $this->db->select(
            'SELECT
                employee_id,
                personalnumber,
                salutation,
                firstname,
                lastname,
                category,
                absence,
                login,
                role
            FROM
                employee
            WHERE
                employee_id = :_id', array(':_id' => $id)
        );
    }

    /**
     * Saves the edited data
     *
     * @param array $data The data
     */
    public function editSave($data)
    {
        // update employee with password if there is a new set
        if ($data['password']) {
            $updateArray = array(
                'personalnumber' => $data['personalnumber'],
                'salutation' => $data['salutation'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'category' => $data['category'],
                'absence' => $data['absence'],
                'login' => $data['login'],
                'password' => Hash::create($data['password']),
                'role' => $data['role']
            );
        } else {
            $updateArray = array(
                'personalnumber' => $data['personalnumber'],
                'salutation' => $data['salutation'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'category' => $data['category'],
                'absence' => $data['absence'],
                'login' => $data['login'],
                'role' => $data['role']
            );
        }
        $this->db->update('employee', $updateArray, "`employee_id`={$data['employee_id']} AND role != 1");
    }

    /**
     * Deletes the affected user
     *
     * @param int $id The affected user id
     */
    public function delete($id)
    {
        $result = $this->db->select(
            'SELECT
                role
            FROM
                employee
            WHERE
                employee_id = :_id', array(':_id' => $id)
        );

        // dont delete the admin or when you ar the disponent your selfe
        if (
            isset($result[0]) && $result[0]['role'] == 1 ||
            (isset($result[0]) && $result[0]['role'] == 2 &&
            Session::get('usergroup') == 2)
        )
        return false;

        $this->db->delete('employee', "employee_id = '$id'");
    }
}
