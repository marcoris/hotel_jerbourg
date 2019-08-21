<?php
/**
 * Model class
 */
class Model
{
    /**
     * Constructor
     */
    public function __construct()
    {
        // Create a new instance of the database connection
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }
}
