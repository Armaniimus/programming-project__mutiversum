<?php

require_once "controller/EntryController.php";
$EntryController = new EntryController('multiversum_db', 'root', '');
$EntryController->handleRequest();

?>
