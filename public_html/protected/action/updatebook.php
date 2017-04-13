<?php
require_once "../controller/ValidationController.php";
require_once "../controller/BookManagementController.php";
require_once "../entities/Book.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    if (empty($_POST["id"]) != true){
        $id = ValidationController::validateInput($_POST["id"]);
    }
    else{
        $errorArray[] = 'Id must be set';
    }
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
    if (empty($_POST["category"]) != true) {
        $category = ValidationController::validateInput($_POST["category"]);
    } else {
        $errorArray[] = 'Category is required.';
    }
    if (ValidationController::checkForErrors($errorArray)){
        echo "<h4>Please <a href='../view/updatebook.php'>go back</a> and enter information again!</h4>";
    }
    else{
        $book = new Book($id, $title, $author, $isbn, $category, null);
        if (BookManagementController::updateBook($book)){
            $host  = $_SERVER['HTTP_HOST'];
            $uri   ="/Webdev/public_html/protected/view";
            $extra = 'bookmanagement.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
        else{
            $errorArray[] = 'Book could not be updated';
        }
    }
    if (ValidationController::checkForErrors($errorArray)){
        echo "<h4>Please <a href='../view/bookmanagement.php'>go back</a> and try again!</h4>";
    }
}