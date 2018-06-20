<?php

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
        session_unset();
        session_destroy();
        session_start();
    }
} else {
    $_SESSION['timeout'] = $time;
}

// run normal program
require_once "controller/EntryController.php";
$EntryController = new EntryController('multiversum_db', 'root', '');
$EntryController->handleRequest();

?>
