<?php

class Auth
{
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