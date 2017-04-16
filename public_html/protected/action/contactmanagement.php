<?php
require_once "../controller/ContactController.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['contact-reply'])) {
        $request = ContactController::getContactRequestById($_GET["contact-reply"]);
        $request = serialize($request);
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'replyrequest.php';
        header("Location: http://$host$uri/$extra/?request=$request");
        exit;
    }
}