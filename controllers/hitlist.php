<?php

class Hitlist extends Controller
{
    private $path = 'hitlist';

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
        $this->view->lineList = $this->model->lineList();
        $this->view->render($this->path . '/index');
    }

    /**
     * Shows the create page
     *
     */
    public function create()
    {
        $data = array();
        $data['line_name'] = $_POST['line_name'];

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
        $this->view->line = $this->model->edit($id);
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
        $data['line_id'] = $id;
        $data['line_name'] = $_POST['line_name'];

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