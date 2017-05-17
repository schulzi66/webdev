<?php
require_once __DIR__. "/../database/MySQLService.php";

/**
 * Controller-Class LoanController
 */
class LoanController
{
    public static function loanBook($input) {
        $mysqlService = new MySQLService();
        if ($mysqlService->connect()) {
            return $mysqlService->loanBook($input);
        }
        return false;
    }

    public static function returnBook($input) {
        $mysqlService = new MySQLService();
        if ($mysqlService->connect()) {
            return $mysqlService->returnBook($input);
        }
        return false;
    }
}