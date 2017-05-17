<?php
require_once __DIR__. "/../controller/MemberManagementController.php";
require_once __DIR__. "/../controller/SessionController.php";

/**
 * Validate session before executing action
 */
SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //check if the call from the membermanagement view is for the update, delete or add
    if (isset($_GET['member-update'])) {
        //load member object from database via controller
        $member = MemberManagementController::getMemberById($_GET["member-update"]);
        //serialize the book to pass it in the redirect as parameter
        $member = serialize($member);
        //redirect with parameter to according view
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'updatemember.php';
        header("Location: http://$host$uri/$extra/?member=$member");
        exit;
    }

    if (isset($_GET['member-delete'])) {
        //load member object from database via controller
        $member = MemberManagementController::getMemberById($_GET["member-delete"]);
        //serialize the book to pass it in the redirect as parameter
        $member = serialize($member);
        //redirect with parameter to according view
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'deletemember.php';
        header("Location: http://$host$uri/$extra/?member=$member");
        exit;
    }

    if (isset($_GET['member-add'])) {
        //redirect to according view
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'addmember.php';
        header("Location: http://$host$uri/$extra");
        exit;
    }
}
