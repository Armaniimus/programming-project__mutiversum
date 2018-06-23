<?php
require_once "ContentLogic.php";
require_once "SessionLogic.php";

require_once "traits\ValidatePHP_ID.php";
require_once "PhpUtilities-v2.php";

require_once "DataHandler-v3.php";
require_once "DataValidator-v3.php";

require_once "HtmlElements-v1.php";

class EntryModel {

    private $ContentLogic;
    private $SessionLogic;
    private $HtmlElements;


    public function __construct($dbName, $username, $pass, $serverAdress, $dbType) {
        $this->ContentLogic     = new ContentLogic      ($dbName, $username, $pass, $serverAdress, $dbType);
        $this->SessionLogic     = new SessionLogic      ();
        $this->HtmlElements     = new HtmlElements      ();
    }

    public function __destruct() {
        $this->ContentLogic     = NULL;
        $this->SessionLogic     = NULL;
        $this->HtmlElements     = NULL;
    }

    public function Get404Data() {
        return $this->ContentLogic->Get404Data();
    }

    public function GetContentHome() {
        return $this->ContentLogic->GetHomeData();
    }

    public function GetContentSpecificData($id) {
        return $this->ContentLogic->GetSpecificData($id);
    }

    public function GetContentOverViewData($option = null) {
        return $this->ContentLogic->GetOverViewData($option);
    }

    public function GetContentSearchData($option = null) {
        return $this->ContentLogic->GetSearchData($option);
    }

    public function GetAdminLogin() {
        return $this->SessionLogic->AdminLogin();
    }

    public function GetSessionSupport() {
        return $this->SessionLogic->SessionSupport();
    }

    public function GetLogout() {
        return $this->SessionLogic->Logout();
    }

    public function GetAddToCart() {
        return $this->SessionLogic->AddToCart();
    }
}
