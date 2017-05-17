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
    //check if all required fields are set
    if (empty($_POST["ID"]) != true) {
        $id = ValidationController::validateInput($_POST["ID"]);
    } else {
        $id = null;
        $errorArray[] = 'Id must be set';
    }

    //check for errors
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../../public/view/membermanagement.php'>go back</a> and try again!</h4>";
    } else {
        //no errors
        //call to controller
        if (MemberManagementController::deleteMember($id)) {
            //redirect to overview
            $host = $_SERVER['HTTP_HOST'];
            $uri = "webdev/public/view";
            $arr = explode('htdocs', __DIR__);
            $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
            $extra = 'membermanagement.php';
            header("Location: http://$host$path$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Member could not be deleted';
        }
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../../public/view/membermanagement.php'>go back</a> and try again!</h4>";
    }
}