<?php
/**
 * Bookings controller class extends from controller class
 */
class Bookings extends Controller
{
    private $_path = 'bookings';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        // Check authority and forward user to login page if user dont have permission
        Auth::check();
        $role = Session::get('role');

        if ($role > 2) {
            header('location: ' . URL . 'login');
        }

        $this->view->js = array($this->_path . '/js/script.js');
    }

    /**
     * Call the render function
     *
     * @return void
     */
    public function index()
    {
        $this->model->checkBookings();
        $this->view->setGuests = $this->model->getGuests();
        $this->view->setFreeRooms = $this->model->getFreeRooms();
        $this->view->bookingList = $this->model->bookingList();

        $this->view->render($this->_path . '/index');
    }

    /**
     * Gets the data to create
     *
     * @return void
     */
    public function create()
    {
        // array data to return
        $data = array();

        // failurecount for empty requested fields
        $failure = 1;

        // set data if guest select is not set
        if (empty($_POST['guest'])) {
            $data['salutation'] = $_POST['salutation'];
            $data['firstname'] = $_POST['firstname'];
            $data['lastname'] = $_POST['lastname'];
            $data['birthday'] = $_POST['birthday'];
            $data['identity'] = $_POST['identity'];
            $data['guest1_id'] = '';
        } else {
            // set guest id of selected guest
            $data['guest1_id'] = $_POST['guest'];
        }

        // set data if guest 2 select is not set
        if (empty($_POST['guest2'])
            && !empty($_POST['salutation2'])
            && !empty($_POST['firstname2'])
            && !empty($_POST['lastname2'])
            && !empty($_POST['birthday2'])
            && !empty($_POST['identity2'])
        ) {
            $data['salutation2'] = $_POST['salutation2'];
            $data['firstname2'] = $_POST['firstname2'];
            $data['lastname2'] = $_POST['lastname2'];
            $data['birthday2'] = $_POST['birthday2'];
            $data['identity2'] = $_POST['identity2'];
            $data['guest2_id'] = '';
        } else {
            // set guest 2 id of selected guest
            if (!empty($_POST['guest2'])) {
                $data['guest2_id'] = $_POST['guest2'];
            }
        }

        // other necessary data
        $data['room_id'] = $_POST['room'];
        $data['arrive'] = $_POST['arrive'];
        $data['depart'] = $_POST['depart'];

        // send the data to the model if the required fields are not empty
        if ($failure == 0) {
            $this->model->create($data);
        }

        // Forward to current location
        header('location: ' . URL . $this->_path);
    }

    /**
     * Shows the edit page
     *
     * @param int $id The affected id
     * 
     * @return void
     */
    public function edit($id)
    {
        $this->view->setGuests = $this->model->getGuests();
        $this->view->setFreeRooms = $this->model->getFreeRooms();
        $this->view->setBookedRoom = $this->model->getBookedRoom($id);
        $this->view->booking = $this->model->edit($id);

        $this->view->render($this->_path . '/edit');
    }

    /**
     * The edit save function
     *
     * @param int $id The affected id
     * 
     * @return void
     */
    public function editSave($id)
    {
        $data = array();
        $data['booking_id'] = $id;
        $data['guest1_id'] = $_POST['guest'];
        $data['guest2_id'] = !empty($_POST['guest2']) ? $_POST['guest2'] : 0;
        $data['room_id'] = $_POST['room'];
        $data['arrive'] = $_POST['arrive'];
        $data['depart'] = $_POST['depart'];
        $data['booking_status'] = $_POST['booking_status'];

        $this->model->editSave($data);
        header('location: ' . URL . $this->_path);
    }

    /**
     * The cancel function
     *
     * @param integer $id The affected id to cancel
     * 
     * @return void
     */
    public function cancel($id)
    {
        $this->model->cancel($id);
        header('location: ' . URL . $this->_path);
    }

    /**
     * The delete function
     *
     * @param int $id The affected id
     * 
     * @return void
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . $this->_path);
    }
}
