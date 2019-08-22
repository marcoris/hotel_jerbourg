<?php
/**
 * Bookings model class extends from model class
 */
class Bookings_Model extends Model
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Checks if a booking is older than 5 days -> set booking status to deleted
     * and set room status to free
     * 
     * @return void
     */
    public function checkBookings()
    {
        $created = $this->db->select(
            'SELECT
                created,
                room_id
            FROM
                bookings
            WHERE
                booking_status = 1'
        );

        for ($i = 0; $i < count($created); $i++) {
            if ((strtotime($created[$i]['created']) + (60*60*24*5)) < time()) {
                // set booking status to deleted
                $updateArray = array(
                    'booking_status' => 0,
                    'updated' => date("Y-m-d H:i:s")
                );
        
                $this->db->update('bookings', $updateArray, "created='{$created[$i]['created']}'");

                // set room status to free
                $updateArray = array(
                    'room_status' => 0,
                    'updated' => date("Y-m-d H:i:s")
                );
        
                $this->db->update('rooms', $updateArray, "room_id={$created[$i]['room_id']}");
            }
        }
    }
    
    /**
     * Gets the list of all guests for the selects
     *
     * @return array The guests list
     */
    public function getGuests()
    {
        return $this->db->select(
            'SELECT
                guest_id,
                CONCAT(firstname, " ", lastname, " >>> ", identity) guest
            FROM
                guests'
        );
    }
    
    /**
     * Gets all free rooms  with number and price for the selects
     *
     * @return array The free rooms list
     */
    public function getFreeRooms()
    {
        return $this->db->select(
            'SELECT
                room_id,
                CONCAT(room_number, " > ", cat.category, " (CHF ", cat.price, ".- / Nacht)") room
            FROM
                rooms
                JOIN categories cat ON (cat.category_id = rooms.category_id)
            WHERE
                room_status = 0'
        );
    }
    
    /**
     * Gets the booked room
     *
     * @param integer $id The booking id
     * 
     * @return array The booked room
     */
    public function getBookedRoom($id)
    {
        return $this->db->select(
            'SELECT
                rooms.room_id,
                CONCAT(room_number, " > ", categories.category, " (CHF ", categories.price, ".- / Nacht)") room
            FROM
                rooms
                JOIN categories ON (categories.category_id = rooms.category_id)
                JOIN bookings ON (bookings.room_id = rooms.room_id)
            WHERE
            bookings.booking_id = :id', array(':id' => $id)
        );
    }

    /**
     * Gets the list of all bookings
     *
     * @return array The bookings list
     */
    public function bookingList()
    {
        return $this->db->select(
            'SELECT
                bookings.booking_id,
                CONCAT(guests.firstname, " ", guests.lastname) guest,
                rooms.room_number,
                CONCAT(DATE_FORMAT(bookings.created, "%Y%m%d"), bookings.booking_id) booking_nr,
                bookings.booking_status,
                DATE_FORMAT(bookings.arrive, "%d.%m.%Y") arrive,
                DATE_FORMAT(bookings.depart, "%d.%m.%Y") depart,
                rooms.category_id
            FROM
                bookings
                LEFT JOIN guests ON (bookings.guest_id = guests.guest_id)
                JOIN rooms ON (rooms.room_id = bookings.room_id)'
        );
    }

    /**
     * Creates a booking and when needed the guests
     *
     * @param array $data The data
     * 
     * @return void
     */
    public function create($data)
    {
        // if guest has id then he exists set id for bookings table
        $guest_id = (!empty($data['guest_id'])) ? $data['guest_id'] : 0;
        
        // if guest has no id then create a guest with the data and
        // get his id to set id for the bookings table
        if ($guest_id == 0) {
            $insertArray = array(
                'salutation' => $data['salutation'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'birthday' => $data['birthday'],
                'identity' => $data['identity'],
                'created' => date("Y-m-d H:i:s")
            );
    
            $this->db->insert('guests', $insertArray);

            // set guest id
            $guest_id = $this->db->select('SELECT guest_id FROM guests ORDER BY guest_id DESC LIMIT 1');
            $guest_id = $guest_id[0]['guest_id'];
        }

        // insert data in bookings table
        $insertArray2 = array(
            'guest_id' => $guest_id,
            'room_id' => $data['room_id'],
            'arrive' => date("Y-m-d", strtotime($data['arrive'])),
            'depart' => date("Y-m-d", strtotime($data['depart'])),
            'booking_status' => 1,
            'created' => date("Y-m-d H:i:s")
        );

        // create booking
        $this->db->insert('bookings', $insertArray2);

        // update room status to reserved
        $updateArray = array(
            'room_status' => 1,
            'updated' => date("Y-m-d H:i:s")
        );

        $this->db->update('rooms', $updateArray, "room_id={$data[room_id]}");
    }

    /**
     * Gets the affected booking to edit
     *
     * @param integer $id The id of the affected booking
     * 
     * @return array booking data
     */
    public function edit($id)
    {
        return $this->db->select(
            'SELECT
                booking_id,
                guest_id,
                room_id,
                DATE_FORMAT(arrive, "%d.%m.%Y") arrive,
                DATE_FORMAT(depart, "%d.%m.%Y") depart,
                booking_status,
                created
            FROM
                bookings
            WHERE
                booking_id = :id', array(':id' => $id)
        );
    }

    /**
     * Saves the edited booking data
     *
     * @param array $data The data
     */
    public function editSave($data)
    {
        $updateArray = array(
            'guest_id' => $data['guest_id'],
            'room_id' => $data['room_id'],
            'booking_status' => $data['booking_status'],
            'arrive' => date("Y-m-d", strtotime($data['arrive'])),
            'depart' => date("Y-m-d", strtotime($data['depart'])),
            'updated' => date("Y-m-d H:i:s")
        );

        $this->db->update('bookings', $updateArray, "booking_id={$data['booking_id']}");

        // set room status
        $updateArray2 = array(
            'room_status' => ($data['booking_status'] == 0 || $data['booking_status'] == 4 ? 0 : 1),
            'updated' => date("Y-m-d H:i:s")
        );

        $this->db->update('rooms', $updateArray2, "room_id={$data['room_id']}");
    }

    /**
     * Gets the booking status (for cancel purposes)
     *
     * @param integer $id The booking id
     * 
     * @return integer booking status
     */
    public function getBookingStatus($id)
    {
        // get booking status
        return $this->db->select(
            'SELECT
                booking_status
            FROM
                bookings
            WHERE
                booking_id = :id', array(':id' => $id)
        );
    }

    /**
     * Cancels the affected booking
     *
     * @param integer $id The affected id
     * 
     * @return void
     */
    public function cancel($id)
    {
        // get room id to set room status to free
        $roomID = $this->db->select(
            'SELECT
                room_id
            FROM
                bookings
            WHERE
                booking_id = :id', array(':id' => $id)
        );

        // set booking status to deleted
        $updateArray = array(
            'booking_status' => 0,
            'deleted' => date("Y-m-d H:i:s")
        );

        $this->db->update('bookings', $updateArray, "booking_id='$id'");

        // set room status to free
        $updateArray2 = array(
            'room_status' => 0,
            'updated' => date("Y-m-d H:i:s")
        );

        $this->db->update('rooms', $updateArray2, "room_id={$roomID[0]['room_id']}");
    }

    /**
     * Deletes the affected booking
     *
     * @param integer $id The affected id
     * 
     * @return void
     */
    public function delete($id)
    {
        // Delete the relationships and booking permanently
        $this->db->delete('bookings', "booking_id = '$id'");
    }
}
