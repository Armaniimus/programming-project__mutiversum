<?php
require_once "ContentLogic.php";
require_once "UsersLogic.php";
require_once "view_loginLogic.php";

require_once "DataHandler/DataHandler.php";
require_once "HtmlElements.php";
require_once "DataValidator/DataValidator.php";

class EntryModel {

    private $ContentLogic;
    private $UsersLogic;
    private $View_loginLogic;

    private $HtmlElements;
    private $DataHandler;
    private $DataValidator;

    public function __construct($dbName, $username, $pass, $serverAdress, $dbType) {
        $this->ContentLogic     = new ContentLogic      ($dbName, $username, $pass, $serverAdress, $dbType);
        $this->UsersLogic       = new UsersLogic        ($dbName, $username, $pass, $serverAdress, $dbType);
        $this->View_loginLogic  = new View_loginLogic   ($dbName, $username, $pass, $serverAdress, $dbType);

        $this->DataHandler      = new DataHandler       ($dbName, $username, $pass, $serverAdress, $dbType);
      //$this->DataValidator    = new DataValidator     ($columnNames, $dataTypes, $dataNullArray);
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

        if (isset($returnArray["author"])) {
            $returnArray["author"] = $this->UsersLogic->GetFullName($returnArray["author"]);
        }
        return $returnArray;
    }

    public function Get404Data($view) {
        return $this->ContentLogic->Get404Data($view);
    }

    public function GetLoginForm() {
        $db_Data = $this->View_loginLogic->GetView_LoginData();
        $this->DataValidator = new DataValidator($db_Data["columnNames"], $db_Data["dataTypes"], $db_Data["dataNullArray"]);

        $columnNames    = $db_Data["columnNames"];
        $dataTypes      = $this->DataValidator->GetHtmlValidateData();
        $dataNullArray  = $this->DataValidator->ValidateHTMLNotNull();

        $return = $this->HtmlElements->GenerateForm("post", "", "loginForm", ["$columnNames[0]"=>"","$columnNames[1]"=>""], $columnNames, $dataTypes, $dataNullArray, 1);
        return $return;
    }
}
