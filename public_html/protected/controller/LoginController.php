<?php
require_once "../database/MySQLService.php";

class LoginController {
    /**
     * @param $credentials
     * @return bool
     */
    public static function loginUser($credentials): bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            if ($sqlService->getUserFromDatabase($credentials) != null) {
                return true;
            }
        }
        return false;
    }
}