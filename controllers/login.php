<?php
/**
 * Login class extends controller
 */
class Login extends Controller
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
     * @return void
     */
    public function index()
    {
        $this->view->render('login/index');
    }

    /**
     * Call the login function
     * 
     * @return void
     */
    public function login()
    {
        $this->model->login();
    }

    /**
     * Call the logout function
     * 
     * @return void
     */
    public function logout()
    {
        $this->model->logout();
    }
}