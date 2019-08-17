<?php

class Bookings extends Controller
{
    private $path = 'bookings';

    public function __construct()
    {
        parent::__construct();
        Auth::check();
        $usergroup = Session::get('usergroup');

        if ($usergroup > 2) {
            header('location: ' . URL . 'login');
        }

        $this->view->js = array($this->path . '/js/script.js');
    }

    /**
     * Call the render function
     *
     */
    public function index()
    {
        $this->model->checkBookings();
        $this->view->setGuests = $this->model->getGuests();
        $this->view->setFreeRooms = $this->model->getFreeRooms();
        $this->view->bookingList = $this->model->bookingList();

        $this->view->render($this->path . '/index');
    }

    /**
     * Gets the data to create
     *
     */
    public function create()
    {
        $data = array();

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
        if (empty($_POST['guest2']) &&
            !empty($_POST['salutation2']) &&
            !empty($_POST['firstname2']) &&
            !empty($_POST['lastname2']) &&
            !empty($_POST['birthday2']) &&
            !empty($_POST['identity2'])
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

        $data['room_id'] = $_POST['room'];
        $data['arrive'] = $_POST['arrive'];
        $data['depart'] = $_POST['depart'];

        $this->model->create($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * Shows the edit page
     *
     * @param int $id The affected id
     */
    public function edit($id)
    {
        $this->view->setGuests = $this->model->getGuests();
        $this->view->setFreeRooms = $this->model->getFreeRooms();
        $this->view->setBookedRoom = $this->model->getBookedRoom($id);
        $this->view->bookings = $this->model->edit($id);

        $this->view->render($this->path . '/edit');
    }

    /**
     * The edit save function
     *
     * @param int $id The affected id
     */
    public function editSave($id)
    {
        $data = array();
        $data['booking_id'] = $id;
        $data['guest1_id'] = $_POST['guest'];
        $data['guest2_id'] = $_POST['guest2'];
        $data['room_id'] = $_POST['room'];
        $data['arrive'] = $_POST['arrive'];
        $data['depart'] = $_POST['depart'];
        $data['booking_status'] = $_POST['booking_status'];

        $this->model->editSave($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * The delete function
     *
     * @param int $id The affected id
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . $this->path);
    }
}
