<?php
require_once __DIR__ . "/../controller/ValidationController.php";
require_once __DIR__ . "/../controller/LoginController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    //check if all required fields are set
    if (empty($_POST["userName"]) != true && empty($_POST["password"]) != true) {
        $userName = $_POST["userName"];
        $password = $_POST["password"];

        //create credentials array and check input
        $credentials = ['userName' => $userName, 'password' => $password];
        $credentials = ValidationController::validateInputArray($credentials);
        //call to controller
        if (LoginController::loginUser($credentials)) {
            //start the session and set the admin tag to true to keep track of the session
            session_start();
            $_SESSION["admin"] = true;
            //redirect to dashboard
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
        echo "><strong>Please <a href='../../public/view/admin.php'>go back</a></strong> and enter credentials again.</div>";
    }
}

