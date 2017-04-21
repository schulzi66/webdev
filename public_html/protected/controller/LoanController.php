<?php
require_once "../database/MYSQLService.php";

/**
 * Controller-Class LoanController
 */
class LoanController
{
    public static function loanBook($input) : bool{
        $mysqlService = new MySQLService();
        if ($mysqlService->connect()) {
            return $mysqlService->loanBook($input);
        }
        return false;
    }

    public static function returnBook($input) : bool{
        $mysqlService = new MySQLService();
        if ($mysqlService->connect()) {
            return $mysqlService->returnBook($input);
        }
        return false;
    }
}