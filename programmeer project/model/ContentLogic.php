<?php

class ContentLogic {

    private $DataHandler;
    private $HtmlElements;
    private $DataValidator;

    public function __construct($dbName, $username, $pass, $serverAdress, $dbType) {
        $this->DataHandler = new DataHandler($dbName, $username, $pass, $serverAdress, $dbType);

        $columnNames =   $this->DataHandler->GetColumnNames("content");
        $dataTypes =     $this->DataHandler->GetTableTypes("content");
        $dataNullArray = $this->DataHandler->GetTableNullValues("content");
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
