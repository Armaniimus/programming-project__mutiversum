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

            case 'search':
                $this->controller_search();
                break;

            case 'admin';
                $this->controller_admin();
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
        $contentBoxes = $this->EntryModel->GetContentHome();

        // echo "<pre>";
        // var_dump($resultArray);
        // echo "</pre>";

        include "view/home.php";
    }

    public function controller_specific() {

        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $resultArray = $this->EntryModel->GetContentSpecificData($id);

            include "view/specific.php";

        } else {
            $this->controller_404();
        }
    }

    public function controller_overview() {
        $contentBoxes = $this->EntryModel->GetContentOverViewData();
        include "view/home.php";
    }

    public function controller_search() {
        $contentBoxes = $this->EntryModel->GetContentSearchData();

        if (isset($_POST["search"])) {
            $previousSearch = $_POST["search"];
        }

        include "view/home.php";
    }

    public function controller_admin() {
        $admin = "admin";
        $pass = "wachtwoord";

        $check1_1 = 0;
        $check1_2 = 0;
        $check2_1 = 0;
        $check2_2 = 0;
        $check3 = 0;

        if (isset($_SESSION['user']) && $_SESSION['user'] == $admin) {
            $check3 = 1;
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
                $check3 = 1;
            }
        }

        if ($check3 == 1) {
            $_SESSION['user'] = "admin";
            include "view/admin_panel.php";

        } else {
            include "view/admin_login.php";
        }
        var_dump($_SESSION);
    }
}

?>
