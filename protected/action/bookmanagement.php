<?php
require_once __DIR__ . "/../controller/BookManagementController.php";
require_once __DIR__ . "/../controller/SessionController.php";
require_once __DIR__ . "/../controller/ValidationController.php";

/**
 * Validate session before executing action
 */
SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //check if the call from the bookmanagement view is for the update, delete or add
    if (isset($_GET['book-update'])) {
        $bookId = ValidationController::validateInput($_GET["book-update"]);
        //load book object from database via controller
        $book = BookManagementController::getBookById($bookId);
        //serialize the book to pass it in the redirect as parameter
        $book = serialize($book);
        //redirect with parameter to according view
        $host = $_SERVER['HTTP_HOST'];
        $uri = "webdev/public/view";
        $arr = explode('htdocs', __DIR__);
        $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
        $extra = 'updatebook.php';
        header("Location: http://$host$path$uri/$extra/?book=$book");
        exit;
    }

    if (isset($_GET['book-delete'])) {
        $bookId = ValidationController::validateInput($_GET["book-delete"]);
        //load book object from database via controller
        $book = BookManagementController::getBookById($bookId);
        //serialize the book to pass it in the redirect as parameter
        $book = serialize($book);
        //redirect with parameter to according view
        $host = $_SERVER['HTTP_HOST'];
        $uri = "webdev/public/view";
        $arr = explode('htdocs', __DIR__);
        $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
        $extra = 'deletebook.php';
        header("Location: http://$host$path$uri/$extra/?book=$book");
        exit;
    }

    if (isset($_GET['book-add'])) {
        //redirect to according view
        $host = $_SERVER['HTTP_HOST'];
        $uri = "webdev/public/view";
        $arr = explode('htdocs', __DIR__);
        $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
        $extra = 'addbook.php';
        header("Location: http://$host$path$uri/$extra");
        exit;
    }
}