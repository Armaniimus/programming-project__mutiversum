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
                $this->Controller_Contact();
                break;

            case 'home':
                $this->Controller_Home();
                break;

            case 'specific':
                $this->Controller_Specific();
                break;

            case 'products':
                $this->Controller_Overview();
                break;

            case 'winkelwagen':
                $this->Controller_Winkelwagen();
                break;

            case 'search':
                $this->Controller_Search();
                break;

            case 'admin';
                $this->Controller_Admin();
                break;

            case 'admin_products';
                $this->Controller_AdminProducts();
                break;

            case 'admin_search';
                $this->Controller_AdminSearch();
                break;

            case 'admin_create';
                $this->Controller_AdminCreate();
                break;

            case 'admin_update';
                $this->Controller_adminUpdate();
                break;

            case 'admin_delete';
                $this->Controller_AdminDelete();
                break;

            case 'logout';
                $this->Controller_Logout();
                break;

            default:
                $this->Controller_Home();
                break;
        }
    }

    public function controller_404() {
        // include "view/default.php";
    }

    public function Controller_Home() {
        $contentBoxes = $this->EntryModel->GetContentHome();

        include "view/home.php";
    }

    public function Controller_Contact() {
        include "view/contact.php";
    }

    public function Controller_Specific() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $resultArray = $this->EntryModel->GetContentSpecificData($id);

            include "view/specific.php";

        } else {
            $this->controller_404();
        }
    }

    public function Controller_Overview() {
        $contentBoxes = $this->EntryModel->GetContentOverViewData();
        include "view/home.php";
    }

    public function Controller_Search() {
        $contentBoxes = $this->EntryModel->GetContentSearchData();

        if (isset($_POST["search"])) {
            $previousSearch = $_POST["search"];
        }

        include "view/home.php";
    }


    /***
        admin controllers
    */
    public function Controller_AdminProducts() {
        if (!isset($_SESSION['user']) || $_SESSION['user'] !== "admin" ) {
            $this->Controller_Home();
        } else {
            $contentBoxes = $this->EntryModel->GetContentOverViewData("admin");
            include "view/admin_products.php";
        }
    }

    public function Controller_AdminSearch() {
        if (!isset($_SESSION['user']) || $_SESSION['user'] != "admin" ) {
            $this->Controller_Home();
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

    public function Controller_admin() {
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

    public function CheckLogin() {

    }

    /***
        crud controllers
    */
    public function controller_adminCreate() {
        $form = $this->EntryModel->GetCreate();
        include "view/crudfrom.php";
    }

    /***
        session controllers
    */
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
        if($message == NULL) {
            $message = "<p class='winkelwagen--centerblok'>U heeft geen producten in uw winkelwagen</p>";
        }
        include "view/winkelwagen.php";
    }
}

?>
