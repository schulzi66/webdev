<?php
require_once "../controller/ContentController.php";
require_once "../controller/SessionController.php";

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
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'updatepagecontent.php';
        header("Location: http://$host$uri/$extra/?page-content=$pageContent");
        exit;
    }
}
