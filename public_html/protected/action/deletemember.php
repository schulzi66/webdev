<?php
require_once "../controller/ValidationController.php";
require_once "../controller/MemberManagementController.php";
require_once "../entities/Member.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    if (empty($_POST["id"]) != true) {
        $id = ValidationController::validateInput($_POST["id"]);
    } else {
        $errorArray[] = 'Id must be set';
    }

    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/membermanagement.php'>go back</a> and try again!</h4>";
    } else {
        if (MemberManagementController::deleteMember($id)) {
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/protected/view";
            $extra = 'membermanagement.php';
            header("Location: http://$host$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Member could not be deleted';
        }
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/membermanagement.php'>go back</a> and try again!</h4>";
    }
}