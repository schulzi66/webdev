<?php
require_once "../controller/ValidationController.php";
require_once "../controller/LoanController.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['date']) && isset($_GET['book-return'])) {
        $bookId = $_GET['book-return'];
        $returned = $_GET['date'];
        $inputArray = ['bookId' => $bookId, 'returned' => $returned];
        $inputArray = ValidationController::validateInputArray($inputArray);
        if(!LoanController::returnBook($inputArray))
        {
            $errorArray = array();
            $errorArray[] = "Return book failed.";
        }
    }
    if (isset($_GET['memberID']) && isset($_GET['book-loan'])){
        $bookId = $_GET['book-loan'];
        $memberId = $_GET['memberID'];
        $inputArray = ['bookId' => $bookId, 'memberId' => $memberId];
        $inputArray = ValidationController::validateInputArray($inputArray);
        if(!LoanController::loanBook($inputArray))
        {
            $errorArray = array();
            $errorArray[] = "Return book failed.";
        }
    }
}
