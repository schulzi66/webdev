<?php
class ValidationController
{
    /**
     * @param $data
     * @return string
     */
    public static function validateInput($data): string {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * @param $array
     * @return array
     */
    public static function validateInputArray($array) :array {
        foreach ($array as $data){
            ValidationController::validateInput($data);
        }
        return $array;
    }

    /**
     * @param $errorArray
     * @return bool
     */
    public static function checkForErrors($errorArray) : bool
    {
        if (empty($errorArray) != true){
            echo "<h2>Error!</h2><h3>The following error(s) occurred:</h3>";
            foreach ($errorArray as $msg) {
                echo "- $msg <br/>";
            }
            return true;
        }
        else{
            return false;
        }
    }
}