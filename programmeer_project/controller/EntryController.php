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

        if (isset($_GET["op"])) {
            $op = $_GET["op"];

            if ($op == "addToCart") {
                $this->Controller_AddToCart();
            }
            if ($op == "RemoveFromCart") {
                $this->Controller_RemoveFromCart();
            }
        }


        switch ($view) {
            case '404':
                $this->controller_404();
                break;

            case 'contact':
                $this->controller_contact();
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

            case 'winkelwagen':
                $this->controller_Winkelwagen();
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

            case 'admin_create';
                $this->controller_adminCreate();
                break;

            case 'admin_update';
                $this->controller_adminUpdate();
                break;

            case 'admin_delete';
                $this->controller_adminDelete();
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

    public function controller_contact() {
        include "view/contact.php";
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
            } else {
                $previousSearch = '';
            }

            include "view/admin_products.php";
        }
    }

    public function controller_admin() {
        $array = $this->EntryModel->GetAdminLogin();

        $loggedIn = $array[0];
        $admin_input = $array[1];
        $message = $array[2];

        if ($loggedIn == 1) {
            include "view/admin_panel.php";

        } else {
            include "view/admin_login.php";
        }
    }

    public function controller_Logout() {
        $this->EntryModel->GetLogout();
        $this->controller_home();
    }

    public function Controller_AddToCart() {
        $this->EntryModel->GetAddToCart();
    }

    public function Controller_RemoveFromCart() {
        $this->EntryModel->GetRemoveFromCart();
    }

    public function Controller_Winkelwagen() {
        $message = $this->EntryModel->GetWinkelwagen();
        $message = "<p class='winkelwagen--centerblok'>U heeft geen producten in uw winkelwagen</p>
        ";
        include "view/winkelwagen.php";
    }
}

?>
