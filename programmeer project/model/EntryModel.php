<?php
require_once "ContentLogic.php";

require_once "traits\DH_DV_MixedIN.php";
require_once "PhpUtilities-v1.php";

require_once "DataHandler-v2.php";
require_once "DataValidator-v2.php";

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
        $this->UsersLogic       = NULL;
        $this->View_loginLogic  = NULL;

        $this->DataHandler      = NULL;
        $this->DataValidator    = NULL;
    }

    public function GetDefaultData($view) {
        $returnArray = $this->ContentLogic->GetDefaultData($view);

        return $returnArray;
    }

    public function GetSpecificData($view) {

        $sql = "SELECT naam, merk, prijs, afbeelding FROM 3dbril";
        $returnArray = $this->ContentLogic->GetDefaultData($view);

        return $returnArray;
    }

    public function Get404Data($view) {
        return $this->ContentLogic->Get404Data($view);
    }
}
