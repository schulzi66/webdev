<?php
//namespace Action;
use ValidationController as ValidationController;
use LoginController as LoginController;

require_once "../controller/ValidationController.php";
require_once "../controller/LoginController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    if (empty($_POST["userName"]) != true && empty($_POST["password"]) != true){
        $userName = $_POST["userName"];
        $password = $_POST["password"];

        $validationController = new ValidationController();

        $credentials = ['userName' => $userName, 'password' => $password];
        $credentials = $validationController->validateInputArray($credentials);
        $controller = new LoginController();
        $controller->loginUser($credentials);
    }
    else {
        $errorArray[]= "Please provide valid credentials";
    }
}

