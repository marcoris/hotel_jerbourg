<?php

class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Call render function
     */
    public function index()
    {
        $this->view->render('index/index');
    }

    /**
     * Call render function
     */
    public function error()
    {
        $this->view->render('index/error');
    }
}