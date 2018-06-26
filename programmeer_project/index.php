<?php

// run normal program
require_once "controller/EntryController.php";
$EntryController = new EntryController('multiversum_db', 'root', '');
$EntryController->handleRequest();
?>
