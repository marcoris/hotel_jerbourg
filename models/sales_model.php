<?php

class Sales_Model extends Model
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Shows the list of users
     *
     * @return array The users list
     */
    public function getSales()
    {
        return $this->db->select(
            'SELECT
                categories.category_id,
                YEAR(bookings.created) AS year,
                MONTH(bookings.created) AS month,
                SUM(categories.price) AS sales
            FROM
                bookings
                JOIN rooms ON (rooms.room_id = bookings.room_id)
                JOIN categories ON (categories.category_id = rooms.category_id)
            GROUP BY
                month, categories.category_id
            ORDER BY year DESC, month DESC, category_id DESC'
        );
    }
}
