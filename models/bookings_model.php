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
                CONCAT(firstname, " ", lastname, " >>> ", identity) AS guest
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
                CONCAT(room_number, " > ", cat.category, " (CHF ", cat.price, ".- / Nacht)") AS room
            FROM
                rooms
                JOIN categories AS cat ON (cat.category_id = rooms.category_id)
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
                CONCAT(room_number, " > ", categories.category, " (CHF ", categories.price, ".- / Nacht)") AS room
            FROM
                rooms
                JOIN categories ON (categories.category_id = rooms.category_id)
                JOIN bookings ON (bookings.room_id = rooms.room_id)
            WHERE
            bookings.booking_id = :id', array(':id' => $id)
        );
    }
    
    /**
     * Gets max columns for the guests
     * 
     * @return array Max column count
     */
    public function getMaxColumns()
    {
        return $this->db->select(
            'SELECT
                count(*) maximum FROM guest_to_booking 
                INNER JOIN bookings ON bookings.booking_id = guest_to_booking.booking_id 
            GROUP BY
                guest_to_booking.booking_id 
            ORDER BY
                maximum DESC 
            LIMIT 1'
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
                CONCAT(guests.firstname, " ", guests.lastname) AS guest,
                rooms.room_number,
                bookings.created,
                bookings.booking_status,
                bookings.arrive,
                bookings.depart,
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
        // define guest id variables
        $guest1_id = 0;
        $guest2_id = 0;

        // if guest1 has id then he exists set id for bookings table
        $guest1_id = (!empty($data['guest1_id'])) ? $data['guest1_id'] : 0;
        
        // if guest1 has no id then create a guest with the data and
        // get his id to set id for the bookings table
        if ($guest1_id == 0) {
            $insertArray = array(
                'salutation' => $data['salutation'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'birthday' => $data['birthday'],
                'identity' => $data['identity'],
                'created' => date("Y-m-d H:i:s")
            );
    
            $this->db->insert('guests', $insertArray);

            // set guest1 id
            $guest_id = $this->db->select('SELECT guest_id FROM guests ORDER BY guest_id DESC LIMIT 1');
            $guest1_id = $guest_id[0]['guest_id'];
        }
        
        // if guest2 has id then he exists set id for bookings table
        $guest2_id = (!empty($data['guest2_id'])) ? $data['guest2_id'] : 0;

        // if guest2 has no id then create a guest with the data and
        // get his id to set id for the bookings table
        if ($guest2_id == 0
            && (!empty($data['salutation2'])
            || !empty($data['firstname2'])
            || !empty($data['lastname2'])
            || !empty($data['birthday2'])
            || !empty($data['identity2']))
        ) {
            $insertArray2 = array(
                'salutation' => $data['salutation2'],
                'firstname' => $data['firstname2'],
                'lastname' => $data['lastname2'],
                'birthday' => $data['birthday2'],
                'identity' => $data['identity2'],
                'created' => date("Y-m-d H:i:s")
            );
    
            $this->db->insert('guests', $insertArray2);

            // set guest2 id
            $guest_id = $this->db->select('SELECT guest_id FROM guests ORDER BY guest_id DESC LIMIT 1');
            $guest2_id = $guest_id[0]['guest_id'];
        }

        // insert data in bookings table
        $insertArray3 = array(
            'guest1_id' => $guest1_id,
            'guest2_id' => $guest2_id,
            'room_id' => $data['room_id'],
            'arrive' => $data['arrive'],
            'depart' => $data['depart'],
            'booking_status' => 1,
            'created' => date("Y-m-d H:i:s")
        );

        // create booking
        $this->db->insert('bookings', $insertArray3);

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
                guest1_id,
                guest2_id,
                room_id,
                arrive,
                depart,
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
            'guest1_id' => $data['guest1_id'],
            'guest2_id' => $data['guest2_id'],
            'room_id' => $data['room_id'],
            'booking_status' => $data['booking_status'],
            'arrive' => $data['arrive'],
            'depart' => $data['depart'],
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
            // $this->db->delete('bookings', "booking_id = '$id'");
            // $this->db->delete('guest_to_bookings', "booking_id = '$id'");
    }
}
