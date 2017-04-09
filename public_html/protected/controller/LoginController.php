<?php
require "../database/MySQLService.php";

class LoginController
{
    /**
     * @param $credentials
     * @return bool
     */
    public static function loginUser($credentials): bool
    {
        $sqlService = new MySQLService();
        if ($sqlService->connect()){
            $sqlService->getUserFromDatabase($credentials);
        }
        return true;
    }
}