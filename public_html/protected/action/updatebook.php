<?php
require_once __DIR__. "/../controller/ValidationController.php";
require_once __DIR__. "/../controller/BookManagementController.php";
require_once __DIR__. "/../entities/Book.php";
require_once __DIR__. "/../controller/SessionController.php";

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
    $title = "";
    $author = "";
    $isbn = "";
    $category = "";
    if (empty($_POST["title"]) != true) {
        $title = ValidationController::validateInput($_POST["title"]);
    } else {
        $errorArray[] = 'Title is required.';
    }
    if (empty($_POST["author"]) != true) {
        $author = ValidationController::validateInput($_POST["author"]);
    } else {
        $errorArray[] = 'Author is required.';
    }
    if (empty($_POST["isbn"]) != true) {
        $isbn = ValidationController::validateInput($_POST["isbn"]);
    } else {
        $errorArray[] = 'ISBN is required.';
    }
    $category = ValidationController::validateInput($_POST["category"]);

    //check for errors
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/updatebook.php'>go back</a> and enter information again!</h4>";
    } else {
        //no errors
        //create new book object, use null for category, taken and returned, because these values will not be updated
        $book = new Book($id, $title, $author, $isbn, $category, null, null, null, null);
        //call to controller
        if (BookManagementController::updateBook($book)) {
            //redirect to overview
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/protected/view";
            $extra = 'bookmanagement.php';
            header("Location: http://$host$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Book could not be updated';
        }
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/bookmanagement.php'>go back</a> and try again!</h4>";
    }
}