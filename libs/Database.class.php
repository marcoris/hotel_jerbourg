<?php

class Database extends PDO
{
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
    }

    /**
     * The PDO SELECT function
     *
     * @param string $table The affected table
     * @param array $data The data
     * @param class $fetchMode The mode to fetch the data
     * 
     * @return mixed
     */
    public function select($sql, $data = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $stmt = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue("$key", $value);
        }

        if (!$stmt->execute()) {
            echo "SQL Fehler({$stmt->errorInfo()[1]})<br>";
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
        
        if (!$stmt->execute()) {
            echo "SQL Fehler({$stmt->errorInfo()[1]})<br>";
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
        
        if (!$stmt->execute()) {
            echo "SQL Fehler({$stmt->errorInfo()[1]})<br>";
            echo $stmt->errorInfo()[2];
            die;
        }
    }

    /**
     * The PDO DELETE function
     *
     * @param string $table The affected table
     * @param int $id The affected id to delete
     * @param int $limit The limit count of deletions
     */
    public function delete($table, $where, $limit = 1)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
}