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
$books = unserialize($_SESSION["books"]);
if (isset($_GET['book-update'])) {
    $bookId = $_GET["book-update"] - 1;
    $book = $books[$bookId];
    $book = serialize($book);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   ="/Webdev/public_html/protected/view";
    $extra = 'updatebook.php';
    header("Location: http://$host$uri/$extra/?book=$book");
    exit;
}

if (isset($_GET['book-delete'])) {
    $bookId = $_GET['book-delete'] - 1;
    $book = $books[$bookId];
    $book = serialize($book);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   ="/Webdev/public_html/protected/view";
    $extra = 'deletebook.php';
    header("Location: http://$host$uri/$extra/?book=$book");
    exit;
}

if (isset($_GET['book-add'])) {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   ="/Webdev/public_html/protected/view";
    $extra = 'addbook.php';
    header("Location: http://$host$uri/$extra");
    exit;
}
