<?php
namespace Controller;
class ValidationController
{
    /**
     * @param $data
     * @return string
     */
    function validateInput($data): string {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * @param $array
     * @return array
     */
    function validateInputArray($array) :array {
        foreach ($array as $data){
            $data = $this->validateInput($data);
        }
        return $array;
    }
}