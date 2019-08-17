<?php

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Call the render function
     */
    public function index()
    {
        $this->view->render('login/index');
    }

    /**
     * Call the login function
     */
    public function login()
    {
        $this->model->login();
    }

    /**
     * Call the logout function
     */
    public function logout()
    {
        $this->model->logout();
    }
}