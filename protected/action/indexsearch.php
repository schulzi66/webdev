<?php
require_once __DIR__ . "/../controller/ValidationController.php";
require_once __DIR__ . "/../controller/SearchController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();

    if (empty($_POST["searchText"]) == false) {
        //Server-side validation
        $searchText = $_POST["searchText"];
        $searchText = ValidationController::validateInput($searchText);
        //Give the input to the search controller to get books from the database
        $resultBooks = SearchController::searchBooks($searchText);
        if ($resultBooks != null && count($resultBooks) > 0) {
            $resultBooks = serialize($resultBooks);
            $host = $_SERVER['HTTP_HOST'];
            $uri = "webdev/public/view";
            $arr = explode('htdocs', __DIR__);
            $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
            $extra = 'searchresults.php';
            header("Location: http://$host$path$uri/$extra/?result-books=" . $resultBooks);
            exit;
        } else {
            echo "<h4>No books could be found using the provided search terms. Please <a href='../../index.php'>go back</a>";
        }
    } else {
        $errorArray[] = "Please provide valid search terms";
    }
} else {
    $errorArray[] = "Please provide valid search terms";
}
if (ValidationController::checkForErrors($errorArray)) {
    echo "<h4>Please <a href='../../index.php'>go back</a> and enter search terms again!</h4>";
}