<?php

class Sales extends Controller
{
    private $_path = 'sales';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        Auth::check();
        if (Session::get('usergroup') > 2) {
            header('location: ' . URL . 'login');
        }
    }

    /**
     * Call the render function
     *
     * @return void
     */
    public function index()
    {
        $this->view->sales = $this->model->getSales();
        $this->view->render($this->_path . '/index');
    }
}
