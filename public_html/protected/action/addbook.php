<?php
require_once "../controller/ValidationController.php";
require_once "../controller/BookManagementController.php";
require_once "../entities/Book.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    $title = ""; $author = "";
    $isbn = ""; $category = "";
    if (empty($_POST["title"]) != true) {
        $title = ValidationController::validateInput($_POST["title"]);
    } else {
        $errorArray[] = 'Title is required.';
    }
    if (empty($_POST["author"]) != true) {
        $author= ValidationController::validateInput($_POST["author"]);
    } else {
        $errorArray[] = 'Author is required.';
    }
    if (empty($_POST["isbn"]) != true) {
        $isbn = ValidationController::validateInput($_POST["isbn"]);
    } else {
        $errorArray[] = 'ISBN is required.';
    }
    $category = ValidationController::validateInput($_POST["category"]);

    if (ValidationController::checkForErrors($errorArray)){
        echo "<h4>Please <a href='../view/addbook.php'>go back</a> and enter details again!</h4>";
    }
    else{
        $book = new Book(null, $title, $author, $isbn, $category, null);
        if (BookManagementController::addBook($book)){
            $host  = $_SERVER['HTTP_HOST'];
            $uri   ="/Webdev/public_html/protected/view";
            $extra = 'bookmanagement.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
        else{
            $errorArray[] = 'Book could not be added';
        }
    }
    if (ValidationController::checkForErrors($errorArray)){
        echo "<h4>Please <a href='../view/addbook.php'>go back</a> and enter details again!</h4>";
    }
}