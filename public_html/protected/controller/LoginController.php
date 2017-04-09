<?php
require "../database/MySQLService.php";

class LoginController
{
    /**
     * @param $credentials
     * @return bool
     */
    public static function loginUser($credentials): boolean
    {
        MySQLService::connect();
        return true;
    }
}