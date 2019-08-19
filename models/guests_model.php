<?php
/**
 * Guests model class extends from model class
 */
class Guests_Model extends Model
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Shows the list of guests
     *
     * @return array The guests list
     */
    public function getGuestlist()
    {
        return $this->db->select(
            'SELECT
                guest_id,
                salutation,
                firstname,
                lastname,
                birthday,
                identity
            FROM
                guests
            WHERE
                deleted IS NULL'
        );
    }

    /**
     * Creates a guest
     *
     * @param array $data The data
     * 
     * @return void
     */
    public function create($data)
    {
        $insertStation = array(
            'salutation' => $data['salutation'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'birthday' => $data['birthday'],
            'identity' => $data['identity'],
            'created' => NOW()
        );
        
        // insert guest
        $this->db->insert('guests', $insertStation);
    }

    /**
     * Shows the affected guest to edit
     *
     * @param int $id The affected id
     * 
     * @return array station data
     */
    public function edit($id)
    {
        return $this->db->select(
            'SELECT
                guest_id,
                salutation,
                firstname,
                lastname,
                birthday,
                identity
            FROM
                guests
            WHERE
                guest_id = :_id', array(':_id' => $id)
        );
    }

    /**
     * Saves the edited guest data
     *
     * @param array $data The data
     * 
     * @return void
     */
    public function editSave($data)
    {
        $updateArray = array(
            'salutation' => $data['salutation'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'birthday' => $data['birthday'],
            'identity' => $data['identity'],
            'updated' => NOW()
        );
        $this->db->update('guests', $updateArray, "`guest_id`={$data['guest_id']}");
    }

    /**
     * Sets the affected guest deleted
     *
     * @param int $id The affected id
     * 
     * @return void
     */
    public function delete($id)
    {
        $updateArray = array(
            'deleted' => NOW()
        );
        $this->db->update('guests', $updateArray, "`guest_id`=$id");
    }
}
