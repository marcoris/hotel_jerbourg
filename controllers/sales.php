<?php
/**
 * Sales class extends controller
 */
class Sales extends Controller
{
    private $_path = 'sales';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        // Check authority and forward user to login page if user dont have permission
        Auth::check();
        if (Session::get('role') > 1) {
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
