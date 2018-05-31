<?php
require_once "ContentLogic.php";

require_once "traits\ValidatePHP_ID.php";
require_once "PhpUtilities-v1.php";

require_once "DataHandler-v3.php";
require_once "DataValidator-v3.php";

require_once "HtmlElements-v1.php";

class EntryModel {

    private $ContentLogic;
    private $HtmlElements;


    public function __construct($dbName, $username, $pass, $serverAdress, $dbType) {
        $this->ContentLogic     = new ContentLogic      ($dbName, $username, $pass, $serverAdress, $dbType);
        $this->HtmlElements     = new HtmlElements      ();
    }

    public function __destruct() {
        $this->ContentLogic     = NULL;
        $this->DataHandler      = NULL;
    }

    public function Get404Data() {
        return $this->ContentLogic->Get404Data();
    }

    public function controller_home() {

    }

    public function GetContentSpecificData($id) {
        return $this->ContentLogic->GetSpecificData($id);
    }

    public function GetContentOverViewData() {
        return $this->ContentLogic->GetOverViewData();
    }
}
