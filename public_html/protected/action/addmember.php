<?php
require_once "../controller/ValidationController.php";
require_once "../controller/MemberManagementController.php";
require_once "../entities/Member.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
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
        echo "<h4>Please <a href='../view/addmember.php'>go back</a> and enter details again!</h4>";
    }
    else{
        $member = new Member( null, $firstName, $surName, $address, $phone, $birth, $gender, $email);
        if (MemberManagementController::addMember($member)){
            $host  = $_SERVER['HTTP_HOST'];
            $uri   ="/Webdev/public_html/protected/view";
            $extra = 'membermanagement.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
        else{
            $errorArray[] = 'Member could not be added';
        }
    }
    if (ValidationController::checkForErrors($errorArray)){
        echo "<h4>Please <a href='../view/addmember.php'>go back</a> and enter details again!</h4>";
    }
}