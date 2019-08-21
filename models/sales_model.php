<?php
/**
 * Sales model class extends from model class
 */
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
                categories.category,
                YEAR(bookings.arrive) AS year,
                MONTH(bookings.arrive) AS month,
                SUM(categories.price * (
                    SELECT
                        DATEDIFF(bookings.depart, bookings.arrive)
                    FROM
                        bookings AS book
                    WHERE book.booking_id = bookings.booking_id 
                    )
                ) AS sales
            FROM
                bookings
                JOIN rooms ON (rooms.room_id = bookings.room_id)
                JOIN categories ON (categories.category_id = rooms.category_id)
            WHERE
                bookings.booking_status = 2 OR
                bookings.booking_status = 3 OR
                bookings.booking_status = 4
            GROUP BY
                month, categories.category_id
            ORDER BY year DESC, month DESC, category_id DESC'
        );
    }
}
