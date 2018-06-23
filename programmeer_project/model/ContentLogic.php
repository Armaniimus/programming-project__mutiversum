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
        if ($this->DataValidator->ValidatePHP_ID($id) ) {
            $sql = "SELECT * FROM vr_bril WHERE id = ?";
            $paramArray = [$id];

            $returnArray = $this->DataHandler->ReadSingleData($sql, $paramArray);

            $returnArray["prijs"] = $this->PhpUtilities->Convert_NormalToEuro($returnArray["prijs"]);
            return $returnArray;

        } else {
            return [];
        }
    }

    public function GetOverViewData($option = null) {
        $sql = "SELECT id, naam, prijs, afbeelding, beschrijving FROM vr_bril";
        $returnArray = $this->DataHandler->ReadData($sql);
        $priceConvertedArray = $this->PhpUtilities->Convert_NormalToEuro_2DArray($returnArray, 'prijs');

        if ($option == "admin") {
            return $this->FormatAdminProducts($priceConvertedArray);
        } else {
            return $this->FormatProducts($priceConvertedArray);
        }
    }

    public function GetHomeData() {
        $sql = "SELECT id, naam, prijs, afbeelding, beschrijving FROM vr_bril ORDER BY prijs ASC LIMIT 0,6";
        $returnArray = $this->DataHandler->ReadData($sql);
        $priceConvertedArray = $this->PhpUtilities->Convert_NormalToEuro_2DArray($returnArray, 'prijs');

        return $this->FormatProducts($priceConvertedArray);
    }

    public function GetSearchData($option = null) {
        if (isset($_POST['search']) ) {
            $search = $_POST['search'];
        } else {
            $search = '';
        }

        $columnNames = $this->DataHandler->GetColumnNames("vr_bril");
        array_pop($columnNames);

        $where = $this->DataHandler->SetSearchWhere($search, NULL, $columnNames);
        $sql = "SELECT id, naam, prijs, afbeelding, beschrijving FROM vr_bril $where";


        $returnArray = $this->DataHandler->ReadData($sql);
        $priceConvertedArray = $this->PhpUtilities->Convert_NormalToEuro_2DArray($returnArray, 'prijs');

        if ($option == "admin") {
            return $this->FormatAdminProducts($priceConvertedArray);
        } else {
            return $this->FormatProducts($priceConvertedArray);
        }
    }

    public function WinkelwagenContent($array) {
        $sql = "SELECT naam, prijs, afbeelding FROM vr_bril WHERE id = ?";

        for ($i=0; $i < count($array) ; $i++) {
            $paramArray = [ $array[$i]["id"] ];

            $returnArray[$i] = $this->DataHandler->ReadSingleData($sql, $paramArray);
            $returnArray[$i]["prijs"] = $this->PhpUtilities->Convert_NormalToEuro($returnArray[$i]["prijs"]);
        }

        echo "<pre>";
        var_dump($returnArray);
        echo "</pre>";
    }

    public function FormatProducts($resultArray, $buttons = NULL) {
        $href = 0;

        if (isset($_GET["view"])) {
            $view = $_GET["view"];
        } else
        $view = 'home';

        if ($buttons == NULL) {
            $href = 1;
            $buttons = "<a href='index.php?view=specific&id={id}' class='btn btn-primary'style='background-color: #1abc9c; border-color: #1abc9c;'>Bekijk product</a>
            <br>
            <br>
            <a href='index.php?view=$view&op=addToCart&id={id}' class='winkelwagen-knop pr-2 pl-2' style='background-color: #F1C40F; border-color: #F1C40F;'>Toevoegen aan winkelwagen</a>";
        }

        $contentBoxes = "";
        for ($i=0; $i < count($resultArray); $i++) {
            $contentBoxes .= "<div class='col mt-5'>
                <div class='card' style='width: 18rem;'>
                    <a {href} style='height: 300px; padding: 15px;'>
                        <img style='max-height:290px; imagesize:contain;' class='card-img-top' src='" . $resultArray[$i]['afbeelding'] . "' alt='Card image cap'>
                    </a>
                    <div class='card-body'>
                        <div style='height: 75px'>
                           <h5 class='card-title'>" . $resultArray[$i]['naam'] . "</h5>
                        </div>
                        <p class='card-text'>" . $resultArray[$i]['prijs'] . "</p>
                        $buttons
                    </div>
                </div>
            </div>";

            if ($href == 1) {
                $contentBoxes = str_Replace("{href}", "href='index.php?view=specific&id={id}'", $contentBoxes);
            } else {
                $contentBoxes = str_Replace("{href}", "", $contentBoxes);
            }

            $contentBoxes = str_Replace("{id}", $resultArray[$i]['id'], $contentBoxes);

        }
        return $contentBoxes;
    }

    public function FormatAdminProducts($resultArray) {

        if (isset($_POST['search'])) {
            $previousSearch = $_POST['search'];
        } else {
            $previousSearch = "";
        }

        $buttons = "<div>
            <form action='index.php?view=admin_update&id={id}' method='post'>
                <input class='wijzigproduct-knop' type='submit' name='multiversum' value='Wijzig Product informatie'/>
                <input type='hidden' name='search' value='$previousSearch'/>
            </form>
        </div>
        <br>
        <div style='padding-left: 15px;'>
            <div class='row'>
                <form action='index.php?view=admin_updatefoto&id={id}' method='post'>
                    <input class='wijzigfoto-knop' type='submit' name='multiversum' value='Wijzig Foto'/>
                    <input type='hidden' name='search' value='$previousSearch'/>
                </form>

                <form style='padding-left: 10px;' class='float-l' action='index.php?view=admin_delete&id={id}' method='post'>
                    <input class='delete-knop' type='submit' name='multiversum' value='Delete Product'/>
                    <input type='hidden' name='search' value='$previousSearch'/>
                </form>
            </div>
        </div>";

        return $this->FormatProducts($resultArray, $buttons);
    }
}

?>
