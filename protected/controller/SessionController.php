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
            $uri = "/Webdev/public_html/protected/view";
            $extra = 'dashboard.php';
            header("Location: http://$host$uri/$extra");
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
            $uri = "/Webdev/public_html/public/view";
            $extra = 'admin.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
    }
}