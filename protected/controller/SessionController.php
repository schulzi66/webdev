<?php

/**
 * Controller-Class SessionController
 */
class SessionController {
    /**
     *
     */
    public static function redirectAdmin(){
        session_start();
        if (!empty($_SESSION) && $_SESSION["admin"] == true) {
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/public/view";
            $path = $_COOKIE["path"];
            $extra = 'dashboard.php';
            header("Location: http://$host$path$uri/$extra");
            exit;
        }
    }

    /**
     *
     */
    public static function logout() {
        session_start();
        session_unset();
        session_destroy();
        self::validateAdminSession();
    }

    /**
     *
     */
    public static function validateAdminSession(){
        session_start();
        if ($_SESSION["admin"] == false) {
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/public/view";
            $path = $_COOKIE["path"];
            $extra = 'admin.php';
            header("Location: http://$host$path$uri/$extra");
            exit;
        }
    }
}