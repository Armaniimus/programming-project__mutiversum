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
            $view = "";
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
                $this->controller_overview();
                // $this->controller_specific();
                // $this->controller_home();
                break;
        }
    }

    public function controller_404() {
        // include "view/default.php";
    }

    public function controller_home() {

    }

    public function controller_specific() {

        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $resultArray = $this->EntryModel->GetContentSpecificData($id);

            echo "<pre>";
            var_dump($resultArray);
            echo "</pre>";

        } else {
            $this->controller_404();
        }



    }

    public function controller_overview() {
        $resultArray = $this->EntryModel->GetContentOverViewData();

        echo "<pre>";
        var_dump($resultArray);
        echo "</pre>";
    }
}

?>
