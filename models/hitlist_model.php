<?php
/**
 * Hitlist model class extends from model class
 */
class Hitlist_Model extends Model
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Gets the hitlist data
     *
     * @return array The hitlist
     */
    public function getHitlist()
    {
        return $this->db->select(
            'SELECT
                COUNT(*) AS counts,
                CONCAT(guests.firstname, " ", guests.lastname) AS guest_name
            FROM
                bookings
                JOIN guest_to_booking AS gtb ON (gtb.booking_id = bookings.booking_id)
                JOIN guests ON (guests.guest_id = gtb.guest_id)
            WHERE
                bookings.booking_status != 0
            GROUP BY
                guest_name
            ORDER BY
                counts DESC, guest_name'
        );
    }
}
