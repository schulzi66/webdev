<?php


class SessionController
{
    /**
     *
     */
    public static function validateAdminSession(): void {
        session_start();
        if ($_SESSION["admin"] == false){
            $host  = $_SERVER['HTTP_HOST'];
            $uri   ="/Webdev/public_html/protected/view";
            $extra = 'admin.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
    }

    /**
     *
     */
    public static function redirectAdmin() : void {
        session_start();
        if ($_SESSION["admin"] == true){
            $host  = $_SERVER['HTTP_HOST'];
            $uri   ="/Webdev/public_html/protected/view";
            $extra = 'dashboard.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
    }
}