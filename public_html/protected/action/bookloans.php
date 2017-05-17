<?php
require_once __DIR__. "/../controller/ValidationController.php";
require_once __DIR__. "/../controller/LoanController.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['date']) && isset($_GET['book-return'])) {
        $bookId = $_GET['book-return'];
        $returned = $_GET['date'];
        if ($returned == "") {
            $returned = gmdate("Y-m-d");
        } else {
            $returned = changeDateToDatabaseFormat($returned);
        }
        $inputArray = ['bookId' => $bookId, 'returned' => $returned];
        $inputArray = ValidationController::validateInputArray($inputArray);
        if (!LoanController::returnBook($inputArray)) {
            $errorArray = array();
            $errorArray[] = "Return book failed.";
        }
    }
    if (isset($_GET['memberID']) && isset($_GET['book-loan']) && isset($_GET['date'])) {
        $bookId = $_GET['book-loan'];
        $memberId = $_GET['memberID'];
        $taken = $_GET['date'];
        if ($taken == "") {
            $taken = gmdate("Y-m-d");
        } else {
            $taken = changeDateToDatabaseFormat($taken);
        }
        $inputArray = ['bookId' => $bookId, 'memberId' => $memberId, 'taken' => $taken];
        $inputArray = ValidationController::validateInputArray($inputArray);
        if (!LoanController::loanBook($inputArray)) {
            $errorArray = array();
            $errorArray[] = "Return book failed.";
        }
    }
}

function changeDateToDatabaseFormat($date)
{
    //changes dates to a database friendly format (YYYY-mm-DD)
    $dateArray = explode("/", $date);
    return $dateArray[2] . "-" . $dateArray[1] . "-" . $dateArray[0];
}
