<?php

class Bookings_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Shows the list of rollmaterial
     *
     * @return array The rollmaterial list
     */
    public function rollmaterialList()
    {
        return $this->db->select(
            'SELECT
                rollmaterial_id,
                number,
                type,
                date_of_commissioning,
                date_of_last_revision,
                date_of_next_revision,
                class,
                seating,
                availability
            FROM
                rollmaterial'
        );
    }

    /**
     * Creates a rolmaterial
     *
     * @param array $data The data
     */
    public function create($data)
    {
        $insertArray = array(
            'number' => $data['number'],
            'type' => $data['type'],
            'date_of_commissioning' => $data['date_of_commissioning'],
            'date_of_last_revision' => $data['date_of_last_revision'],
            'date_of_next_revision' => $data['date_of_next_revision'],
            'class' => $data['class'],
            'seating' => $data['seating'],
            'availability' => $data['availability']
        );

        $this->db->insert('rollmaterial', $insertArray);
    }

    /**
     * Shows the affected rollmaterial to edit
     *
     * @param int $id The id of the affected user
     * 
     * @return array rollmaterial data
     */
    public function edit($id)
    {
        return $this->db->select(
            'SELECT
                rollmaterial_id,
                number,
                type,
                date_of_commissioning,
                date_of_last_revision,
                date_of_next_revision,
                class,
                seating,
                availability
            FROM
                rollmaterial
            WHERE
                rollmaterial_id = :id', array(':id' => $id)
        );
    }

    /**
     * Saves the edited rollmaterial data
     *
     * @param array $data The data
     */
    public function editSave($data)
    {
        $updateArray = array(
            'number' => $data['number'],
            'type' => $data['type'],
            'date_of_commissioning' => $data['date_of_commissioning'],
            'date_of_last_revision' => $data['date_of_last_revision'],
            'date_of_next_revision' => $data['date_of_next_revision'],
            'class' => $data['class'],
            'seating' => $data['seating'],
            'availability' => $data['availability']
        );

        $this->db->update('rollmaterial', $updateArray, "`rollmaterial_id`={$data['rollmaterial_id']}");
    }

    /**
     * Deletes the affected rollmaterial
     *
     * @param int $id The affected id
     */
    public function delete($id)
    {
        $this->db->delete('rollmaterial', "rollmaterial_id = '$id'");
    }
}
