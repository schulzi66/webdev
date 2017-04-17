<?php


class SessionController {
    /**
     *
     */
    public static function redirectAdmin(): void {
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
    public static function logout(): void {
        session_start();
        session_unset();
        session_destroy();
        self::validateAdminSession();
    }

    /**
     *
     */
    public static function validateAdminSession(): void {
        session_start();
        if ($_SESSION["admin"] == false) {
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/src/view";
            $extra = 'admin.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
    }
}