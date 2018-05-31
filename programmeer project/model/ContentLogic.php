<?php

class ContentLogic {

    private $PhpUtilities;
    private $DataHandler;
    private $DataValidator;

    public $columnNames;
    public $dataTypes;
    public $dataNullArray;

    public function __construct($dbName, $username, $pass, $serverAdress, $dbType) {
        $this->PhpUtilities     =   new PhpUtilities      ();
        $this->DataHandler      =   new DataHandler       ($dbName, $username, $pass, $serverAdress, $dbType);

        $columnNames            =   $this->DataHandler->GetColumnNames("3dbril");
        $dataTypes              =   $this->DataHandler->GetTableTypes("3dbril");
        $dataNullArray          =   $this->DataHandler->GetTableNullValues("3dbril");

        $this->DataValidator    =   new DataValidator     ($columnNames, $dataTypes, $dataNullArray);
    }

    public function __destruct() {
        $this->DataHandler = NULL;
    }

    public function GetSpecificData() {
        $sql = "SELECT naam, merk, prijs, afbeelding FROM 3dbril";
        $returnArray = $this->ContentLogic->GetDefaultData();

        return $returnArray;
    }

    public function GetOverViewData() {
        $sql = "SELECT naam, merk, prijs, afbeelding FROM 3dbril";
        $returnArray = $this->ContentLogic->GetDefaultData();

        return $returnArray;
    }
}
?>
