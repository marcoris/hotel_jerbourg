<?php
/**
 * Login model class extends from model class
 */
class Login_Model extends Model
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Here is the login function to log the user in and sets the necessary data
     * and forward the user on the bookings page
     * 
     * @return void
     */
    public function login()
    {
        $data = $this->db->select(
            'SELECT
                login,
                role
            FROM
                employees
            WHERE
                login = :login AND
                password = :password', array(':login' => $_POST['login'], ':password' => Hash::create($_POST['password']))
        );

        // if there is at least one row set the session
        if (count($data) > 0) {
            Session::init();
            Session::set('login', $data[0]['login']);
            Session::set('role', $data[0]['role']);
            Session::set('loggedIn', true);
            header('location: ../bookings');
        } else {
            header('location: ../login');
        }
    }

    /**
     * Here is the logout function to destroy the session and forward the user to the login page
     * 
     * @return void
     */
    public function logout()
    {
        Session::init();
        $destroyArray = ['login', 'role', 'loggedIn'];
        Session::destroy($destroyArray);
        header('location: ' . URL . 'login');
        exit;
    }
}
