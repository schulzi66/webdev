<?php
require_once "../controller/ValidationController.php";
require_once "../controller/BookManagementController.php";
require_once "../entities/Book.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    //check if all required fields are set
    if (empty($_POST["id"]) != true) {
        $id = ValidationController::validateInput($_POST["id"]);
    } else {
        $errorArray[] = 'Id must be set';
    }

    //check for errors
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/bookmanagement.php'>go back</a> and try again!</h4>";
    } else {
        //no errors
        //call to controller
        if (BookManagementController::deleteBook($id)) {
            //redirect to overview
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/protected/view";
            $extra = 'bookmanagement.php';
            header("Location: http://$host$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Book could not be deleted';
        }
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/bookmanagement.php'>go back</a> and try again!</h4>";
    }
}