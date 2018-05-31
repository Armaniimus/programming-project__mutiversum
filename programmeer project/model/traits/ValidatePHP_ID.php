<?php
trait ValidatePHP_ID {

    /****
    ** description -> Selects specified data from an array
    ** relies on methods -> Null

    ** Requires -> $array, $code
    ** string variables -> $code
    ** array variables -> $array
    ****/

    private function ValidatePHP_ID($idValue, $Method = NULL) {

        // run tests and set return message if needed
        if ($idValue == "" || $idValue == NULL) {
            $message = "ID does not have a value";
            $return = FALSE;

        } else if ( (is_numeric($idValue) == FALSE) ) {
            $message = "ID is not a number";
            $return = FALSE;

        } else if ( (floor($idValue) == $idValue) == FALSE) {
            $message = "ID is not an INT";
            $return = FALSE;

        } else if ( ($idValue >= 0) == FALSE) {
            $message = "ID is a negative number";
            $return = FALSE;

        } else {
            $return = TRUE;
        }

        // Test if the result was succesfull
        if ($return == FALSE) {
            throw new Exception("ERROR->[Invalid ID] MESSAGE->[$message] IDVALUE->[$idValue] METHOD->[$Method]");
            return FALSE;

        } else {
            return TRUE;
        }

    }
}


 ?>
