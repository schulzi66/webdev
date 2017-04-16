<?php
require_once "../controller/ValidationController.php";
require_once "../controller/SearchController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();

    if (empty($_POST["bookTitle"]) == false || empty($_POST["bookAuthor"]) == false){
        $bookTitle = $_POST["bookTitle"];
        $bookAuthor = $_POST["bookAuthor"];
        if (empty($_POST["notLoaned"])) {
            $notLoaned = "";
        } else {
            $notLoaned = $_POST["notLoaned"];
        }
        $searchArray = ['bookTitle' => $bookTitle, 'bookAuthor' => $bookAuthor, 'notLoaned' => $notLoaned];
        $searchArray = ValidationController::validateInputArray($searchArray);
        $resultBooks = SearchController::searchBooks($searchArray);
        if ($resultBooks != null && count($resultBooks) > 0){
            //TODO PHKO ODER JULS: VERARBEITE BOOK ARRAY
            var_dump($resultBooks);
        }
        else
        {
            echo "<h4>No books could be found using the provided search terms. Please <a href='../../src/view/search.php'>go back</a>";
        }
    }
        else{
            $errorArray[]= "Please provide valid search terms";
        }
    }
    else {
        $errorArray[]= "Please provide valid search terms";
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../../src/view/search.php'>go back</a> and enter search terms again!</h4>";
    }

