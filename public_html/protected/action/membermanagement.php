<?php
require_once "../controller/MemberManagementController.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $members = unserialize($_SESSION["members"]);
    if (isset($_GET['member-update'])) {
        $member = MemberManagementController::getMemberById($_GET["member-update"]);
        $member = serialize($member);
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'updatemember.php';
        header("Location: http://$host$uri/$extra/?member=$member");
        exit;
    }

    if (isset($_GET['member-delete'])) {
        $member = MemberManagementController::getMemberById($_GET["member-delete"]);
        $member = serialize($member);
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'deletemember.php';
        header("Location: http://$host$uri/$extra/?member=$member");
        exit;
    }

    if (isset($_GET['member-add'])) {
        $host = $_SERVER['HTTP_HOST'];
        $uri = "/Webdev/public_html/protected/view";
        $extra = 'addmember.php';
        header("Location: http://$host$uri/$extra");
        exit;
    }
}
