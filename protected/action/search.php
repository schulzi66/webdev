<?php
require_once __DIR__ . "/../controller/ValidationController.php";
require_once __DIR__ . "/../controller/SearchController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();

    if (empty($_POST["bookTitle"]) == false || empty($_POST["bookAuthor"]) == false) {
        $bookTitle = $_POST["bookTitle"];
        $bookAuthor = $_POST["bookAuthor"];
        //HTML automatically sets a ticked checkbox to the string "on", if set.
        if (empty($_POST["isAvailableCheckbox"])) {
            $isAvailable = "";
        } else {
            $isAvailable = $_POST["isAvailableCheckbox"];
        }
        //Server-side validation
        $searchArray = ['bookTitle' => $bookTitle, 'bookAuthor' => $bookAuthor, 'isAvailable' => $isAvailable];
        $searchArray = ValidationController::validateInputArray($searchArray);
        //Give the input to the search controller to get books from the database
        $resultBooks = SearchController::searchBooks($searchArray);
        if ($resultBooks != null && count($resultBooks) > 0) {
            $resultBooks = serialize($resultBooks);
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/public/view";
            $extra = 'searchresults.php';
            header("Location: http://$host$uri/$extra/?result-books=" . $resultBooks);
            exit;
        } else {
            echo "<h4>No books could be found using the provided search terms. Please <a href='../../public/view/search.php'>go back</a>";
        }
    } else {
        $errorArray[] = "Please provide valid search terms";
    }
} else {
    $errorArray[] = "Please provide valid search terms";
}
if (ValidationController::checkForErrors($errorArray)) {
    echo "<h4>Please <a href='../../public/view/search.php'>go back</a> and enter search terms again!</h4>";
}

