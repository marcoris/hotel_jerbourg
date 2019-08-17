<?php

class Hitlist_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Shows the list of lines
     *
     * @return array The lines list
     */
    public function lineList()
    {
        return $this->db->select(
            'SELECT
                line_id,
                line_name
            FROM
                line'
        );
    }
    
    /**
     * Creates a line
     *
     * @param array $data The data
     */
    public function create($data)
    {
        $insertArray = array(
            'line_name' => $data['line_name']
        );

        $this->db->insert('line', $insertArray);
    }

    /**
     * Get line to edit
     *
     * @param int $id The affected id
     * 
     * @return array line data
     */
    public function edit($id)
    {
        return $this->db->select(
            'SELECT
                line_id,
                line_name
            FROM
                line
            WHERE
                line_id = :_id', array(':_id' => $id)
        );
    }

    /**
     * Saves the edited data
     *
     * @param array $data The data
     */
    public function editSave($data)
    {
        // update line with password if there is a new set
        $updateArray = array(
            'line_name' => $data['line_name']
        );
        $this->db->update('line', $updateArray, "`line_id`={$data['line_id']}");
    }

    /**
     * Deletes the affected line
     *
     * @param int $id The affected line id
     */
    public function delete($id)
    {
        // just to prevent the lines 1 - 4 of deletion
        if ($id > 5)
        $this->db->delete('line', "line_id = '$id'");
    }
}
