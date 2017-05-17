<?php
require_once __DIR__ . "/../controller/ValidationController.php";
require_once __DIR__ . "/../controller/MemberManagementController.php";
require_once __DIR__ . "/../entities/Member.php";
require_once __DIR__ . "/../controller/SessionController.php";

/**
 * Validate session before executing action
 */
SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    $firstName = "";
    $surName = "";
    $phone = "";
    $address = "";
    $birth = "";
    $gender = "";
    $mail = "";
    //check if all required fields are set
    if (empty($_POST["firstName"]) != true) {
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
        echo "<h4>Please <a href='../../public/view/addmember.php'>go back</a> and enter details again!</h4>";
    } else {
        //no errors
        //create new member object
        $member = new Member(null, $firstName, $surName, $address, $phone, $birth, $gender, $email);
        //call to controller
        if (MemberManagementController::addMember($member)) {
            //redirect to overview
            $host = $_SERVER['HTTP_HOST'];
            $uri = "webdev/public/view";
            $arr = explode('htdocs', __DIR__);
            $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
            $extra = 'membermanagement.php';
            header("Location: http://$host$path$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Member could not be added';
        }
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../../public/view/addmember.php'>go back</a> and enter details again!</h4>";
    }
}