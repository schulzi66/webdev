<?php
require_once "../controller/ContentController.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['page-update'])) {
        $pageContent = ContentController::getContentByPageName($_GET["page-update"]);
        $pageContent = serialize($pageContent);
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'updatepagecontent.php';
        header("Location: http://$host$uri/$extra/?page-content=$pageContent");
        exit;
    }
}
