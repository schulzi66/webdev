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
        $sqlService = new MySQLService();
        $sa = $sqlService->connect();
        if ($sa){
            $sqlService->getUserFromDatabase($credentials);
        }
        return true;
    }
}