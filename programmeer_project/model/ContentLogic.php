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

        $columnNames            =   $this->DataHandler->GetColumnNames("vr_bril");
        $dataTypes              =   $this->DataHandler->GetTableTypes("vr_bril");
        $dataNullArray          =   $this->DataHandler->GetTableNullValues("vr_bril");

        $this->DataValidator    =   new DataValidator     ($columnNames, $dataTypes, $dataNullArray);
    }

    public function __destruct() {
        $this->DataHandler = NULL;
    }

    public function GetSpecificData($id) {
        if ( $this->DataValidator->ValidatePHP_ID($id) ) {
            $sql = "SELECT * FROM vr_bril WHERE id = ?";
            $paramArray = [$id];

            $returnArray = $this->DataHandler->ReadSingleData($sql, $paramArray);
            return $returnArray;

        } else {
            return [];
        }
    }

    public function GetOverViewData($option = null) {
        $sql = "SELECT id, naam, prijs, afbeelding, beschrijving FROM vr_bril";
        $returnArray = $this->DataHandler->ReadData($sql);
        $priceConvertedArray = $this->PhpUtilities->ConvertNumericData(0, $returnArray, 'prijs');

        if ($option == "admin") {
            return $this->FormatAdminEndResult($priceConvertedArray);
        } else {
            return $this->FormatEndResult($priceConvertedArray);
        }
    }

    public function GetHomeData() {
        $sql = "SELECT id, naam, prijs, afbeelding, beschrijving FROM vr_bril ORDER BY prijs ASC LIMIT 0,6";
        $returnArray = $this->DataHandler->ReadData($sql);
        $priceConvertedArray = $this->PhpUtilities->ConvertNumericData(0, $returnArray, 'prijs');
    }

    public function GetSearchData($option = null) {
        if (isset($_POST['search']) ) {
            $search = $_POST['search'];
        } else {
            $search = '';
        }

        $where = $this->DataHandler->SetSearchWhere($search, "vr_bril");
        $sql = "SELECT id, naam, prijs, afbeelding, beschrijving FROM vr_bril $where";

        $returnArray = $this->DataHandler->ReadData($sql);
        $priceConvertedArray = $this->PhpUtilities->ConvertNumericData(0, $returnArray, 'prijs');


        if ($option == "admin") {
            return $this->FormatAdminEndResult($priceConvertedArray);
        } else {
            return $this->FormatEndResult($priceConvertedArray);
        }
    }

    public function FormatEndResult($resultArray) {
        $contentBoxes = "";
        for ($i=0; $i < count($resultArray); $i++) {
            $contentBoxes .= "<div class='col mt-5'>
                <div class='card' style='width: 18rem;'>
                    <div style='height: 300px; padding: 5px;'>
                        <img style='max-height:290px; imagesize:contain;' class='card-img-top' src='" . $resultArray[$i]['afbeelding'] . "' alt='Card image cap'>
                    </div>
                    <div class='card-body'>
                        <div style='height: 75px'>
                           <h5 class='card-title'>" . $resultArray[$i]['naam'] . "</h5>
                        </div>
                        <p class='card-text'>" . $resultArray[$i]['prijs'] . "</p>
                        <a href='index.php?view=specific&id=" . $resultArray[$i]['id'] . "' class='btn btn-primary'>Bekijk product</a>
                    </div>
                </div>
            </div>";
        }

        return $contentBoxes;
    }

    public function FormatAdminEndResult($resultArray) {
        $adminBar = "<div
            <a></a>
            <a></a>
        </div>";

        $contentBoxes = "";
        for ($i=0; $i < count($resultArray); $i++) {
            $contentBoxes .= "<div class='col mt-5'>
                <div class='card' style='width: 18rem;'>
                    <div style='height: 300px; padding: 5px;'>
                        <img style='max-height:290px; imagesize:contain;' class='card-img-top' src='" . $resultArray[$i]['afbeelding'] . "' alt='Card image cap'>
                    </div>
                    <div class='card-body'>
                        <div style='height: 75px'>
                           <h5 class='card-title'>" . $resultArray[$i]['naam'] . "</h5>
                        </div>
                        <p class='card-text'>" . $resultArray[$i]['prijs'] . "</p>
                        <a href='index.php?view=admin_specific&id=" . $resultArray[$i]['id'] . "' class='btn btn-primary'>Bekijk product</a>
                    </div>
                </div>
            </div>";
        }

        return $contentBoxes;
    }
}

?>
