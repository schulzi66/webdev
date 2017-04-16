<?php
require_once "../controller/ContactController.php";
require_once "../controller/ValidationController.php";
require_once "../entities/ContactRequest.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $errorArray = array();
    $name = ""; $surName = "";
    $email = ""; $message = "";
    if (empty($_POST["name"]) != true){
        $name = $_POST["name"];
    }
    else{
        $errorArray[] = "Name is required";
    }
    if (empty($_POST["surname"]) != true){
        $surName = $_POST["surname"];
    }
    else{
        $errorArray[] = "Surname is required";
    }
    if (empty($_POST["email"]) != true){
        $email = $_POST["email"];
    }
    else{
        $errorArray[] = "Email is required";
    }
    if (empty($_POST["message"]) != true){
        $message = $_POST["message"];
    }
    else{
        $errorArray[] = "Message is required";
    }
    if (ValidationController::checkForErrors($errorArray)){
        echo "<h4>Please <a href='../../src/view/contact.php'>go back</a> and enter details again again!</h4>";
    }
    else{
        $contactRequest = new ContactRequest(null, $name, $surName, $email, $message);
        if (ContactController::receiveContactRequest($contactRequest)){
            $host  = $_SERVER['HTTP_HOST'];
            $uri   ="/Webdev/public_html/src";
            $extra = 'index.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
        else{
            $errorArray[] = "Contact request could not be send.";
        }
    }
    if (ValidationController::checkForErrors($errorArray)){
        echo "<h4>Please <a href='../../src/view/contact.php'>go back</a> and try again!</h4>";
    }
}