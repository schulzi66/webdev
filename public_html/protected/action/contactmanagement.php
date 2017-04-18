<?php
require_once "../controller/ContactController.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //check if the call from the contactmanagement view includes needed parameter
    if (isset($_GET['contact-reply'])) {
        //load contact request object from database via controller
        $request = ContactController::getContactRequestById($_GET["contact-reply"]);
        //serialize the request object to pass it in the redirect as parameter
        $request = serialize($request);
        //redirect to view with parameter
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'replyrequest.php';
        header("Location: http://$host$uri/$extra/?request=$request");
        exit;
    }
}