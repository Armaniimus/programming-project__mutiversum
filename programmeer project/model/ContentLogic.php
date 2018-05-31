<?php

class ContentLogic {

    private $PhpUtilities;
    private $DataHandler;
    private $DataValidator;

    public $columnNames;
    public $dataTypes;
    public $dataNullArray;

    public function __construct($dbName, $username, $pass, $serverAdress, $dbType) {
        $this->PhpUtilities     = new PhpUtilities      ();
        $this->DataHandler      = new DataHandler       ($dbName, $username, $pass, $serverAdress, $dbType);

        $columnNames            =   $this->DataHandler->GetColumnNames("3dbril");
        $dataTypes              =   $this->DataHandler->GetTableTypes("3dbril");
        $dataNullArray          =   $this->DataHandler->GetTableNullValues("3dbril");

        $this->DataValidator    = new DataValidator     ($columnNames, $dataTypes, $dataNullArray);
    }

    public function __destruct() {
        $this->DataHandler = NULL;
    }

    public function Get404Data($page) {
        // set sql query
        $sql = "SELECT title, content, keywords, description, author_users_id as author FROM content WHERE name = '$page'";
        return $this->DataHandler->ReadSingleData($sql);
    }

    public function GetDefaultData($page) {
        // set sql query
        $sql = "SELECT title, content, keywords, description, author_users_id as author FROM content WHERE name = '$page'";
        return $this->DataHandler->ReadSingleData($sql);
    }
}
?>
