<?php

require_once "model/EntryModel.php";

class EntryController {
    private $EntryModel;

    public function __construct($dbName, $username, $pass, $serverAdress = "localhost", $dbType = "mysql" ) {
        $this->EntryModel  = new EntryModel    ($dbName, $username, $pass, $serverAdress, $dbType);
        $this->EntryModel->GetSessionSupport();
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

            case 'products':
                $this->controller_overview();
                break;

            case 'search':
                $this->controller_search();
                break;

            case 'admin';
                $this->controller_admin();
                break;

            case 'admin_products';
                $this->controller_adminProducts();
                break;

            case 'admin_search';
                $this->controller_adminSearch();
                break;

            case 'logout';
                $this->controller_Logout();
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

    public function controller_adminProducts() {
        if (!isset($_SESSION['user']) || $_SESSION['user'] !== "admin" ) {
            $this->controller_home();
        } else {
            $contentBoxes = $this->EntryModel->GetContentOverViewData("admin");
            include "view/admin_products.php";
        }
    }

    public function controller_adminSearch() {
        if (!isset($_SESSION['user']) || $_SESSION['user'] != "admin" ) {
            $this->controller_home();
        } else {
            $contentBoxes = $this->EntryModel->GetContentSearchData("admin");

            if (isset($_POST["search"])) {
                $previousSearch = $_POST["search"];
            }

            include "view/admin_products.php";
        }
    }

    public function controller_admin() {
        $admin_input = $this->EntryModel->GetAdminLogin();
        if ($admin_input == 1) {
            $_SESSION['user'] = "admin";
            include "view/admin_panel.php";

        } else {
            include "view/admin_login.php";
        }
    }

    public function controller_Logout() {
        $this->EntryModel->GetLogout();
        $this->controller_home();
    }
}

?>
