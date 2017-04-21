<?php
require_once "../controller/ValidationController.php";
require_once "../controller/MemberManagementController.php";
require_once "../entities/Member.php";
require_once "../controller/SessionController.php";

/**
 * Validate session before executing action
 */
SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    //check if all required fields are set
    if (empty($_POST["ID"]) != true) {
        $id = ValidationController::validateInput($_POST["ID"]);
    } else {
        $id = null;
        $errorArray[] = 'Id must be set';
    }
    $firstName = "";
    $surName = "";
    $phone = "";
    $address = "";
    $birth = "";
    $gender = "";
    $mail = "";
    if (empty($_POST["firstName"]) != true) { //TODO MASC: empty != true ===> !empty(xxx)
        $firstName = ValidationController::validateInput($_POST["firstName"]);
    } else {
        $errorArray[] = 'Firstname is required.';
    }
    if (empty($_POST["surName"]) != true) {
        $surName = ValidationController::validateInput($_POST["surName"]);
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

    //check for errors
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/updatemember.php'>go back</a> and enter information again!</h4>";
    } else {
        //no errors
        //create new member object
        $member = new Member($id, $firstName, $surName, $address, $phone, $birth, $gender, $email);
        //call to controller
        if (MemberManagementController::updateMember($member)) {
            //redirect to overview
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/protected/view";
            $extra = 'membermanagement.php';
            header("Location: http://$host$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Member could not be updated';
        }
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/membermanagement.php'>go back</a> and try again!</h4>";
    }
}