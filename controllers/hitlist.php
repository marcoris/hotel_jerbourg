<?php
/**
 * Hitlist class extends controller
 */
class Hitlist extends Controller
{
    private $_path = 'hitlist';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        // Check authority and forward user to login page if user dont have permission// Check authority and forward user to login page if user dont have permission
        Auth::check();
        if (Session::get('role') > 2) {
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
        $this->view->hitlist = $this->model->getHitlist();
        $this->view->render($this->_path . '/index');
    }
}