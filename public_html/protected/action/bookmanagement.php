<?php
require_once "../controller/BookManagementController.php";
session_start();
if ($_SESSION["admin"] != true){
    $host  = $_SERVER['HTTP_HOST'];
    $uri   ="/Webdev/public_html/protected/view";
    $extra = 'admin.php';
    header("Location: http://$host$uri/$extra");
    exit;
}
if (isset($_GET['book-update'])) {
    $bookId = ($_GET['book-update']);
    $book = BookManagementController::getBookById($bookId);
    $book = serialize($book);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   ="/Webdev/public_html/protected/view";
    $extra = 'updatebook.php';
    //TODO MASC find solution
    header("Location: http://$host$uri/$extra/?book='.$book.'");
    exit;
}
//TODO MASC
if (isset($_GET['book-delete'])) {
    $book = $_GET['book-delete'];
}

if (isset($_GET['book-add'])) {
    //TODO MASC
}
