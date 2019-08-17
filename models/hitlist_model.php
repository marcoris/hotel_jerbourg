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
    public function getHitlist()
    {
        return $this->db->select(
            'SELECT
                COUNT(*) AS counts,
                CONCAT(guests.firstname, " ", guests.lastname) AS guest_name
            FROM
                bookings
                JOIN guests ON (guests.guest_id = bookings.guest1_id OR guests.guest_id = bookings.guest2_id)
            GROUP BY
                guest_name
            ORDER BY
                counts DESC'
        );
    }
}
