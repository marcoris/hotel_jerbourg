<?php
/**
 * ErrorHandler class
 */
class ErrorHandler extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Call the render function
     * 
     * @param string $msg The message to show
     * 
     * @return void
     */
    public function index($msg)
    {
        $this->view->message = $msg;
        $this->view->render('error/index');
        exit;
    }
}