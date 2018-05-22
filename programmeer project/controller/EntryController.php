<?php

require_once "model/EntryModel.php";

class EntryController {
    private $EntryModel;

    public function __construct($dbName, $username, $pass, $serverAdress = "localhost", $dbType = "mysql" ) {
        $this->EntryModel  = new EntryModel    ($dbName, $username, $pass, $serverAdress, $dbType);
    }

    public function __destruct() {
        $this->EntryModel   = NULL;
    }

    public function handleRequest() {

        if (isset($_GET["view"])) {
            $view = $_GET["view"];
        } else {
            $view = "home";
        }

        switch ($view) {
            case '404':
                $this->controller_404($view);
                break;

            case 'home':
                $this->controller_home($view);
                break;

            case 'specific':
                $this->controller_specific($view);
                break;

            case 'overview':
                $this->controller_overview($view);
                break;
        }
    }

    public function controller_404() {
        include "view/default.php";
    }

    public function controller_home() {

    }

    public function controller_specific() {

    }

    public function controller_overview() {

    }
}

?>
