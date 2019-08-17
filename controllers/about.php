<?php

class About extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Call the render function
     */
    public function index()
    {
        $this->view->render('about/index');
    }
}