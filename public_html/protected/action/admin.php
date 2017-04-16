<?php
require_once "../controller/ValidationController.php";
require_once "../controller/LoginController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    if (empty($_POST["userName"]) != true && empty($_POST["password"]) != true) {
        $userName = $_POST["userName"];
        $password = $_POST["password"];

        $credentials = ['userName' => $userName, 'password' => $password];
        $credentials = ValidationController::validateInputArray($credentials);
        if (LoginController::loginUser($credentials)) {
            session_start();
            $_SESSION["admin"] = true;
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/protected/view";
            $extra = 'dashboard.php';
            header("Location: http://$host$uri/$extra");
            exit;
        } else {
            $errorArray[] = "Please provide valid credentials";
        }
    } else {
        $errorArray[] = "Please provide valid credentials";
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<div class=\"alert alert-danger\"><strong>Please <a href='../view/admin.php'>go back</a></strong> and enter credentials again.</div>";
    }
}

