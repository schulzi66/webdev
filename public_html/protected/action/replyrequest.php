<?php
require_once "../controller/MailController.php";
require_once "../controller/SessionController.php";
require_once "../controller/ValidationController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    $email = "";
    $id = "";
    $response = "";
    if (empty($_POST["id"]) != true){
        $id = ValidationController::validateInput($_POST["id"]);
    }
    else{
        $errorArray[] = 'ID must be set';
    }
    if (empty($_POST["email"]) != true){
        $email = ValidationController::validateInput($_POST["email"]);
    }
    else{
        $errorArray[] = 'Email must be set';
    }
    if (empty($_POST["response"]) != true){
        $response = ValidationController::validateInput($_POST["response"]);
    }
    else{
        $errorArray[] = 'Response must be set';
    }
    if (ValidationController::checkForErrors($errorArray)){
        echo "<h4>Please <a href='../view/replyrequest.php'>go back</a> and response again!</h4>";
    }
    else {
        if (MailController::sendMail($email,"Reply to your Request with the ID: " . $id, $response)){
            $host  = $_SERVER['HTTP_HOST'];
            $uri   ="/Webdev/public_html/protected/view";
            $extra = 'contactmanagement.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
        else{
            $errorArray[] = 'Reply could not be sent';
        }
    }
    if (ValidationController::checkForErrors($errorArray)){
        echo "<h4>Please <a href='../view/replyrequest.php'>go back</a> and response again!</h4>";
    }
}