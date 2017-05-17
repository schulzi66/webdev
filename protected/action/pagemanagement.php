<?php
require_once __DIR__ . "/../controller/ContentController.php";
require_once __DIR__ . "/../controller/SessionController.php";

/**
 * Validate session before executing action
 */
SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //check if the call from the pagemanagement view includes needed parameter
    if (isset($_GET['page-update'])) {
        //load page content object from database via controller
        $pageContent = ContentController::getContentByPageName($_GET["page-update"]);
        //serialize the page content object to pass it in the redirect as parameter
        $pageContent = serialize($pageContent);
        //redirect to view with parameter
        $host = $_SERVER['HTTP_HOST'];
        $uri = "webdev/public/view";
        $arr = explode('htdocs', __DIR__);
        $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
        $extra = 'updatepagecontent.php';
        header("Location: http://$host$path$uri/$extra/?page-content=$pageContent");
        exit;
    }
}
