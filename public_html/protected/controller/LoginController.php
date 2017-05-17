<?php
require_once __DIR__. "/../database/MySQLService.php";

/**
 * Controller-Class LoginController
 */
class LoginController {
    /**
     * @param $credentials
     * @return bool
     */
    public static function loginUser($credentials){
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            if ($sqlService->getUserFromDatabase($credentials) != null) {
                return true;
            }
        }
        return false;
    }
}