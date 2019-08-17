<?php

class Sales extends Controller
{
    private $path = 'sales';

    public function __construct()
    {
        parent::__construct();
        Auth::check();
        if (Session::get('usergroup') > 2) {
            header('location: ' . URL . 'login');
        }

        $this->view->js = array($this->path . '/js/checkValidation.js');
    }

    /**
     * Call the render function
     *
     */
    public function index()
    {
        $this->view->employeeList = $this->model->employeeList();
        $this->view->render($this->path . '/index');
    }

    /**
     * Shows the create page
     *
     */
    public function create()
    {
        $data = array();
        $data['personalnumber'] = $_POST['personalnumber'];
        $data['salutation'] = $_POST['salutation'];
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['category'] = $_POST['category'];
        $data['absence'] = $_POST['absence'];
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

        $this->model->create($data);
        header('location: ' . URL . $this->path);
    }

    /**
     * Shows the edit page
     *
     * @param int $id The affected employee id
     */
    public function edit($id)
    {
        $this->view->employee = $this->model->edit($id);
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
        $data['employee_id'] = $id;
        $data['personalnumber'] = $_POST['personalnumber'];
        $data['salutation'] = $_POST['salutation'];
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['category'] = $_POST['category'];
        $data['absence'] = $_POST['absence'];
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

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