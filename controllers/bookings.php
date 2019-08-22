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

        // set data if guest select is not set
        if (empty($_POST['guest'])) {
            $data['salutation'] = $_POST['salutation'];
            $data['firstname'] = $_POST['firstname'];
            $data['lastname'] = $_POST['lastname'];
            $data['birthday'] = $_POST['birthday'];
            $data['identity'] = $_POST['identity'];
            $data['guest_id'] = '';
        } else {
            // set guest id of selected guest
            $data['guest_id'] = $_POST['guest'];
        }

        // other necessary data
        $data['room_id'] = $_POST['room'];
        $data['arrive'] = $_POST['arrive'];
        $data['depart'] = $_POST['depart'];

        // send the data to the model if the required fields are not empty
        $this->model->create($data);

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
        $data['guest_id'] = $_POST['guest'];
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
