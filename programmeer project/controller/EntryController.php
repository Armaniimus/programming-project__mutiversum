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
                // $this->controller_overview();
                // $this->controller_specific();
                $this->controller_home();
                break;
        }
    }

    public function controller_404() {
        // include "view/default.php";
    }

    public function controller_home() {
        $resultArray = $this->EntryModel->GetContentHome();

        // echo "<pre>";
        // var_dump($resultArray);
        // echo "</pre>";
        $contentBoxes = "";
        for ($i=0; $i < count($resultArray); $i++) {
            $contentBoxes .= "<div class='col mt-5'>
                <div class='card' style='width: 18rem;'>
    	            <div style='height: 300px'>
                        <img class='card-img-top' src='" . $resultArray[$i]['afbeelding'] . "' alt='Card image cap'>
                    </div>
    		        <div class='card-body'>
                        <div style='height: 75px'>
    	                   <h5 class='card-title'>" . $resultArray[$i]['naam'] . "</h5>
                        </div>
    	                <p class='card-text'>" . $resultArray[$i]['prijs'] . "</p>
    			        <a href='' class='btn btn-primary'>Bekijk product</a>
                    </div>
                </div>
            </div>";
        }

        include "view/home.php";
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
