<?php
require_once __DIR__ . "/../controller/ContactController.php";
require_once __DIR__ . "/../controller/ValidationController.php";
require_once __DIR__ . "/../entities/ContactRequest.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    $name = "";
    $surName = "";
    $email = "";
    $message = "";
    //check if all required fields are set
    if (empty($_POST["name"]) != true) {
        $name = $_POST["name"];
    } else {
        $errorArray[] = "Name is required";
    }
    if (empty($_POST["surname"]) != true) {
        $surName = $_POST["surname"];
    } else {
        $errorArray[] = "Surname is required";
    }
    if (empty($_POST["email"]) != true) {
        $email = $_POST["email"];
    } else {
        $errorArray[] = "Email is required";
    }
    if (empty($_POST["message"]) != true) {
        $message = $_POST["message"];
    } else {
        $errorArray[] = "Message is required";
    }
    //check for errors
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../../public/view/contact.php'>go back</a> and enter details again again!</h4>";
    } else {
        //no errors
        //create new contact request object
        $contactRequest = new ContactRequest(null, $name, $surName, $email, $message, null);
        //call to controller
        if (ContactController::receiveContactRequest($contactRequest)) {
            //redirect
            $host = $_SERVER['HTTP_HOST'];
            $arr = explode('htdocs', __DIR__);
            $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
            $extra = 'webdev/index.php';
            header("Location: http://$host$path$extra");
            exit;
        } else {
            $errorArray[] = "Contact request could not be send.";
        }
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../../public/view/contact.php'>go back</a> and try again!</h4>";
    }
}