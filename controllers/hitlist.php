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

        // $this->view->js = array($this->path . '/js/checkValidation.js');
    }

    /**
     * Call the render function
     *
     * @return void
     */
    public function index()
    {
        $this->view->hitlist = $this->model->getHitlist();
        $this->view->render($this->path . '/index');
    }
}