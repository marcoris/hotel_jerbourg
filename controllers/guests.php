<?php

class Guests extends Controller
{
    private $_path = 'guests';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        // Check authority and forward user to login page if user dont have permission
        Auth::check();
        if (Session::get('usergroup') > 2) {
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
        $this->view->setGuestlist = $this->model->getGuestlist();
        $this->view->render($this->_path . '/index');
    }

    /**
     * Shows the create page
     *
     * @return void
     */
    public function create()
    {
        $data = array();
        $data['salutation'] = $_POST['salutation'];
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['birthday'] = $_POST['birthday'];
        $data['identity'] = $_POST['identity'];

        $this->model->create($data);
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
        $this->view->guest = $this->model->edit($id);
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
        $data['guest_id'] = $id;
        $data['salutation'] = $_POST['salutation'];
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['birthday'] = $_POST['birthday'];
        $data['identity'] = $_POST['identity'];

        $this->model->editSave($data);
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