<?php
/**
 * Authority class
 */
class Auth
{
    /**
     * Function to check authority
     * 
     * @return true if user has grant
     */
    public static function check()
    {
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            header('location: ' . URL . 'login');
            exit;
        }

        return true;
    }
}