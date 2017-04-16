<?php
require_once "../controller/BookManagementController.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['book-update'])) {
        $book = BookManagementController::getBookById($_GET["book-update"]);
        $book = serialize($book);
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'updatebook.php';
        header("Location: http://$host$uri/$extra/?book=$book");
        exit;
    }

    if (isset($_GET['book-delete'])) {
        $book = BookManagementController::getBookById($_GET["book-delete"]);
        $book = serialize($book);
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'deletebook.php';
        header("Location: http://$host$uri/$extra/?book=$book");
        exit;
    }

    if (isset($_GET['book-add'])) {
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'addbook.php';
        header("Location: http://$host$uri/$extra");
        exit;
    }
}