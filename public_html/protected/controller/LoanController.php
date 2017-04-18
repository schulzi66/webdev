<?php
require_once "../database/MYSQLService.php";

/**
 * Created by PhpStorm.
 * User: Philip
 * Date: 18.04.2017
 * Time: 16:24
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