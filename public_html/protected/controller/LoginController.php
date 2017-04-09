<?php
//namespace Controller;
use MySQLService as MySqlService;
//require_once ($_SERVER['DOCUMENT_ROOT']."public_html/protected/database/MySQLService.php");
//require_once $_SERVER['DOCUMENT_ROOT']."/public_html/protected/database/MySQLService.php";
//include ($_SERVER['DOCUMENT_ROOT']."public_html/protected/database/MySQLService.php");
require "../database/MySQLService.php";

class LoginController
{
    /**
     * @param $credentials
     * @return bool
     */
    public function loginUser($credentials): boolean
    {
        $MySQLService = new MySQLService();
        call_user_func(array($MySQLService, 'connect'));
//        MySQLService::connect();
//        $sqlService = new MySQLService();
//        $sqlService->connect();
        return true;
    }
}