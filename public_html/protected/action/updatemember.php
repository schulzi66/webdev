<?php
require_once "../controller/ValidationController.php";
require_once "../controller/MemberManagementController.php";
require_once "../entities/Member.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    if (empty($_POST["id"]) != true){
        $id = ValidationController::validateInput($_POST["id"]);
    }
    else{
        $errorArray[] = 'Id must be set';
    }
    $firstName = ""; $surName = "";
    $phone = ""; $address = "";
    $birth = ""; $gender = "";
    $mail = "";
    if (empty($_POST["firstName"]) != true) {
        $firstName = ValidationController::validateInput($_POST["firstName"]);
    } else {
        $errorArray[] = 'Firstname is required.';
    }
    if (empty($_POST["surName"]) != true) {
        $surName= ValidationController::validateInput($_POST["surName"]);
    } else {
        $errorArray[] = 'Surname is required.';
    }
    if (empty($_POST["address"]) != true) {
        $address = ValidationController::validateInput($_POST["address"]);
    } else {
        $errorArray[] = 'Address is required.';
    }
    $phone = ValidationController::validateInput($_POST["phone"]);
    $birth = ValidationController::validateInput($_POST["birth"]);
    $gender = ValidationController::validateInput($_POST["gender"]);
    $email = ValidationController::validateInput($_POST["email"]);

    if (ValidationController::checkForErrors($errorArray)){
        echo "<h4>Please <a href='../view/updatemember.php'>go back</a> and enter information again!</h4>";
    }
    else{
        $member = new Member( $id, $firstName, $surName, $address, $phone, $birth, $gender, $email);
        if (MemberManagementController::updateMember($member)){
            $host  = $_SERVER['HTTP_HOST'];
            $uri   ="/Webdev/public_html/protected/view";
            $extra = 'membermanagement.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
        else{
            $errorArray[] = 'Member could not be updated';
        }
    }
    if (ValidationController::checkForErrors($errorArray)){
        echo "<h4>Please <a href='../view/membermanagement.php'>go back</a> and try again!</h4>";
    }
}