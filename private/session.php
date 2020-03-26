<?php

require 'initialize.php';

class Session
{

    private $logged_in;

    public $username;


    function __construct()
    {
        session_start();
        // check login will detect if the user is already logged in, when switching pages
        $this->check_login();

    }//end __construct()


    // if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        // set a session key last_activity equal to time
    // last request was more than 30 minutes ago
    // another way to expire cookeis is set session.gc_maxlifetime and session.cookie_lifetime in php.ini
    public function is_logged_in()
    {
        return $this->logged_in;

    }//end is_logged_in()


    public function login($name)
    {
        $this->username     = $_SESSION['username'] = $name;
        $this->is_logged_in = true;

    }//end login()


    public function logout()
    {
        session_unset();
        session_destroy();
        $this->username     = '';
        $this->is_logged_in = false;

    }//end logout()


    private function check_login()
    {
        if (isset($_SESSION['username'])) {
            $this->username  = $_SESSION['username'];
            $this->logged_in = true;
        } else {
            unset($this->username);
            $this->logged_in = false;
        }

    }//end check_login()


}//end class

    $session = new Session();
