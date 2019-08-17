<?php

class Session
{
    /**
     * The session start init function
     */
    public static function init()
    {
        if (session_id() == '') {
            session_start();
        }
    }

    /**
     * Sets the session name and value
     * 
     * @param string $name the session name
     * @param string $value the session value
     */
    public static function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }
    
    /**
     * Gets the session
     * 
     * @param string $name - The affected string to search in the session
     * 
     * @return session with the name
     */
    public static function get($name)
    {
        if (isset($_SESSION[$name]))
        return $_SESSION[$name];
    }

    /**
     * The session destroy function
     * 
     * @param array $destroyArray - The array with session values
     */
    public static function destroy($destroyArray)
    {
        // foreach loop to destroy all setted sessions
        foreach ($destroyArray as $sessname) {
            unset($_SESSION[$sessname]);
        }
        session_destroy();
    }
}