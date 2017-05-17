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
        if (!empty($_SESSION) && in_array("admin", $_SESSION)) {
            if ($_SESSION["admin"] == true){
                $host = $_SERVER['HTTP_HOST'];
                $uri = "webdev/public/view";
                $arr = explode('htdocs', __DIR__);
                $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
                $extra = 'dashboard.php';
                header("Location: http://$host$path$uri/$extra");
                exit;
            }
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
            $uri = "webdev/public/view";
            $arr = explode('htdocs', __DIR__);
            $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
            $extra = 'admin.php';
            header("Location: http://$host$path$uri/$extra");
            exit;
        }
    }
}