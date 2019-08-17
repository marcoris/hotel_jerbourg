<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Here is the login function to log the user in and sets the necessary data
     * and forward the user on the dashboard page
     */
    public function login()
    {
        $stmt = $this->db->prepare(
            'SELECT
                employee_id,
                category,
                firstname,
                lastname,
                login,
                role
            FROM
                employee
            WHERE
                login = :login AND
                password = :password');

        $stmt->execute(array(
            'login' => $_POST['login'],
            'password' => Hash::create($_POST['password'])
        ));

        $data = $stmt->fetch();
        $count = $stmt->rowCount();

        if ($count > 0) {
            Session::init();
            Session::set('usergroup', $data['role']);
            Session::set('login', $data['login']);
            Session::set('firstname', $data['firstname']);
            Session::set('lastname', $data['lastname']);
            Session::set('employee_id', $data['employee_id']);
            Session::set('category', $data['category']);
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }
    }

    /**
     * Here is the logout function to destroy the session and forward the user to the login page
     */
    public function logout()
    {
        Session::init();
        $destroyArray = ['usergroup', 'login', 'loggedIn'];
        Session::destroy($destroyArray);
        header('location: ' . URL . 'login');
        exit;
    }
}
