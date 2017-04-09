<?php
require_once "../controller/ValidationController.php";
require_once "../controller/LoginController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    if (empty($_POST["userName"]) != true && empty($_POST["password"]) != true){
        $userName = $_POST["userName"];
        $password = $_POST["password"];

        $credentials = ['userName' => $userName, 'password' => $password];
        $credentials = ValidationController::validateInputArray($credentials);
        LoginController::loginUser($credentials);
    }
    else {
        $errorArray[]= "Please provide valid credentials";
    }
}

