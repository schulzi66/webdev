<?php
require_once __DIR__. "/../controller/ValidationController.php";
require_once __DIR__. "/../controller/BookManagementController.php";
require_once __DIR__. "/../entities/Book.php";
require_once __DIR__. "/../controller/SessionController.php";

/**
 * Validate the session before executing action
 */
SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    $title = "";
    $author = "";
    $isbn = "";
    $category = "";
    //check if all required fields are set
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
        echo "<h4>Please <a href='../view/addbook.php'>go back</a> and enter details again!</h4>";
    } else {
        //no errors
        //create new book object
        $book = new Book(null, $title, $author, $isbn, $category, null, null, null, null);
        //call to controller
        if (BookManagementController::addBook($book)) {
            //redirect to overview
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/protected/view";
            $extra = 'bookmanagement.php';
            header("Location: http://$host$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Book could not be added';
        }
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/addbook.php'>go back</a> and enter details again!</h4>";
    }
}