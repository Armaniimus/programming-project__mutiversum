<?php

class SessionLogic {
    public function __construct() {}
    public function __destruct() {}

    public function AdminLogin() {
        $admin = "admin";
        $pass = "wachtwoord";
        $message = NULL;

        $check1_1 = 0;
        $check1_2 = 0;
        $check2_1 = 0;
        $check2_2 = 0;
        $check3 = 0;

        if (isset($_SESSION['user']) && $_SESSION['user'] == $admin) {
            $message = 1;
        } else if (isset($_POST['username'])) {
            $admin_input = $_POST['username'];
            $check1_1 = 1;

            if ($_POST['username'] == $admin) {
                $check1_2 = 1;
            }

        } else {
            $admin_input = '';
        }

        if (isset($_POST['password'])) {
            $check2_1 = 1;
            if ($_POST['password'] == $pass) {
                $check2_2 = 1;
            }
        }

        // check if form == filled
        if ($check1_1 && $check2_1) {
            // check if login is unsuccesfull
            if ($check1_2 == 0 || $check2_2 == 0) {
                $message = "gebruikersnaam of wachtwoord is foutief";

            // check if login is succesfull
            } else if ($check1_2 && $check2_2) {
                $message = 1;
            }
        }
        return $message;
    }

    public function SessionSupport() {
        // set session vars
        $expireTime = 1800; // 30m
        $maxExpireTime = 10800; //3 hours
        $time = time();

        // start session
        ini_set('session.gc_maxlifetime', $expireTime); // sets time until marked as garbage on the server
        ini_set('session.cookie_lifetime', $maxExpireTime); // sets time until the cookie is thrown away in the browser
        session_start();

        // check if expiration time is smaller or equal then the difference between stored time vs current time
        // if yes store current time
        // if no destroy and restart session
        if (isset($_SESSION['timeout'])) {
            if ($time - $_SESSION['timeout'] <= $expireTime) {
                $_SESSION['timeout'] = $time;
            } else {
                $this->Logout();
            }
        } else {
            $_SESSION['timeout'] = $time;
        }
    }

    public function Logout() {
        session_unset();
        session_destroy();
        session_start();
    }
}
?>
