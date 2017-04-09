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
            $data = ValidationController::validateInput($data);
        }
        return $array;
    }
}