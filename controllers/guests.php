<?php

class Guests extends Controller
{
    private $path = 'guests';

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
        $this->view->stationList = $this->model->stationList();
        $this->view->getLines = $this->model->getLines();
        $this->view->render($this->path . '/index');
    }

    /**
     * Shows the create page
     *
     */
    public function create()
    {
        $data = array();
        $data['station_name'] = $_POST['station_name'];
        $data['station_time'] = $_POST['station_time'];
        $data['station_sequence'] = $_POST['station_sequence'];
        $data['station_to_line'] = $_POST['station_to_line'];
        $data['station_status'] = $_POST['station_status'];

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
        $this->view->station = $this->model->edit($id);
        $this->view->getLines = $this->model->getLines();
        $this->view->getLineToStation = $this->model->getLineToStation($id);
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
        $data['station_id'] = $id;
        $data['station_name'] = $_POST['station_name'];
        $data['station_time'] = $_POST['station_time'];
        $data['station_sequence'] = $_POST['station_sequence'];
        $data['station_to_line'] = $_POST['station_to_line'];
        $data['station_status'] = $_POST['station_status'];

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