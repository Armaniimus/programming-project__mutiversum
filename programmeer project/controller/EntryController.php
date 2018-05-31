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
                $this->controller_404();
                break;

            case 'home':
                $this->controller_home();
                break;

            case 'specific':
                $this->controller_specific();
                break;

            case 'overview':
                $this->controller_overview();
                break;

            default:
                $this->controller_specific();
                //home $this->controller_home();
                break;

        }
    }

    public function controller_404() {
        include "view/default.php";
    }

    public function controller_home() {

    }

    public function controller_specific() {
        $this->EntryModel->GetContentSpecificData();
    }

    public function controller_overview() {
        $this->EntryModel->GetContentOverViewData();
    }
}

?>
