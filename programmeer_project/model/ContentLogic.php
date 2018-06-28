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
        $this->PhpUtilities = NULL;
        $this->DataHandler = NULL;
        $this->DataValidator = NULL;
    }

    public function GetColumnNames() {
        $columnNames = $this->DataHandler->GetColumnNames("vr_bril");
        array_shift($columnNames);
        array_splice($columnNames,6,1);
        return $columnNames;
    }

    public function GetDataTypes() {
        $dataTypes = $this->DataHandler->GetTableTypes("vr_bril");
        array_shift($dataTypes);
        array_splice($dataTypes,6,1);
        return $dataTypes;
    }

    public function GetDataNull() {
        $dataNullArray = $this->DataHandler->GetTableNullValues("vr_bril");
        array_shift($dataNullArray);
        array_splice($dataNullArray,6,1);
        return $dataNullArray;
    }

    public function CreateNewProduct() {
        $columns = ['naam', 'model', '3d_2d', 'resolutie', 'platform', 'merk', 'prijs', 'beschrijving'];
        $sql = $this->DataHandler->SetCreateQuery("vr_bril", $columns , $_POST);
        return $this->DataHandler->CreateData($sql);
    }

    public function GetUpdateInfo($id) {
        $sql = "SELECT naam, model, 3d_2d, resolutie, platform, merk, afbeelding, prijs, beschrijving FROM vr_bril WHERE id = ?";
        return $this->DataHandler->ReadSingleData($sql, [$id]);
    }

    public function Update($id) {
        $data = $_POST;
        $this->DataHandler->UpdateData(NULL, 'vr_bril', $data, 'id', $id);
    }

    public function DeleteProduct($id) {
        return $this->DataHandler->DeleteData(NULL, "vr_bril", "id", $id);
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
            $home = "<h2 style='display:block'>Products</h2>
            <div class='row'>" .
                $this->FormatProducts($priceConvertedArray) .
            "</div>";
            return $home;
        }
    }

    public function GetHomeData() {
        $sql = "SELECT id, naam, prijs, afbeelding, beschrijving FROM vr_bril ORDER BY prijs ASC LIMIT 0,6";
        $returnArray = $this->DataHandler->ReadData($sql);
        $priceConvertedArray = $this->PhpUtilities->Convert_NormalToEuro_2DArray($returnArray, 'prijs');

        $home = "<h2>Home page</h2>
        <p class='home-text'>Voor mooie Vr-brillen kun je het best hier zijn.
        6 aanbiedingen speciaal voor u geselecteerd</p>
        <div class='row'>" .
            $this->FormatProducts($priceConvertedArray) .
        "</div>";
        return $home;
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

        $prijsTotaal = 6.50;
        for ($i=0; $i < count($array) ; $i++) {
            $paramArray = [ $array[$i]["id"] ];

            $returnArray[$i] = $this->DataHandler->ReadSingleData($sql, $paramArray);
            $returnArray[$i]["id"] = $array[$i]["id"];
            $returnArray[$i]["aantal"] = $array[$i]["aantal"];

            $prijsTotaal += ($returnArray[$i]["prijs"] * $returnArray[$i]["aantal"]);
            $returnArray[$i]["prijs"] = $this->PhpUtilities->toFixed($returnArray[$i]["prijs"], 2);//convert to a 2 decimal number
            $returnArray[$i]["prijs"] = $this->PhpUtilities->Convert_NormalToEuro($returnArray[$i]["prijs"]); //convert to dutch number representation
        }

        $prijsTotaal = $this->PhpUtilities->toFixed($prijsTotaal, 2);
        $returnArray[0]["prijsTotaal"] = $this->PhpUtilities->Convert_NormalToEuro($prijsTotaal);
        return $returnArray;
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
