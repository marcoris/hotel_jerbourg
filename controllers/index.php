<?php
/**
 * Index class extends controller
 */
class Index extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Call render function
     * 
     * @return void
     */
    public function index()
    {
        $this->view->render('index/index');
    }

    /**
     * Call render function
     * 
     * @return void
     */
    public function error()
    {
        $this->view->render('index/error');
    }
}