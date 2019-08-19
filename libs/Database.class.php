<?php
/**
 * Database class extends from PDO class
 */
class Database extends PDO
{
    /**
     * Constructor
     * 
     * @param string $DB_TYPE Type of Connection
     * @param string $DB_HOST Hostname
     * @param string $DB_NAME Database name
     * @param string $DB_USER Database user
     * @param string $DB_PASS Database password
     * 
     * @return void
     */
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
    }

    /**
     * The PDO SELECT function
     *
     * @param string $sql The sql query
     * @param array $data The data array
     * @param class $fetchMode The mode to fetch the data
     * 
     * @return array The return array
     */
    public function select($sql, $data = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $stmt = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue("$key", $value);
        }

        // There was an error -> output the SQL error
        if (!$stmt->execute()) {
            echo "SQL Error({$stmt->errorInfo()[1]})<br>";
            echo $stmt->errorInfo()[2];
            die;
        }

        return $stmt->fetchAll($fetchMode);
    }

    /**
     * The PDO INSERT INTO function
     *
     * @param string $table The affected table
     * @param array $data The data
     * 
     * @return void
     */
    public function insert($table, $data = array())
    {
        ksort($data);

        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $stmt = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        // There was an error -> output the SQL error
        if (!$stmt->execute()) {
            echo "SQL Error({$stmt->errorInfo()[1]})<br>";
            echo $stmt->errorInfo()[2];
            die;
        }
    }

    /**
     * The PDO UPDATE function
     *
     * @param string $table The affected table
     * @param array $data The data
     * @param string $where The WHERE string to search into
     * 
     * @return void
     */
    public function update($table, $data = array(), $where)
    {
        ksort($data);

        $fieldDetails = null;

        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }

        $fieldDetails = rtrim($fieldDetails, ',');

        $stmt = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        // There was an error -> output the SQL error
        if (!$stmt->execute()) {
            echo "SQL Error({$stmt->errorInfo()[1]})<br>";
            echo $stmt->errorInfo()[2];
            die;
        }
    }

    /**
     * The PDO DELETE function
     *
     * @param string $table The affected table
     * @param integer $where The where conditions
     * @param integer $limit The limit count of deletions
     * 
     * @return void
     */
    public function delete($table, $where, $limit = 1)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
}