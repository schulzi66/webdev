<?php
require_once "../controller/ValidationController.php";
require_once "../controller/ContentController.php";
require_once "../entities/PageContent.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    $id = "";
    $pageName = "";
    $headline = "";
    $content = "";
    if (empty($_POST["pageName"]) != true) {
        $pageName = ValidationController::validateInput($_POST["pageName"]);
    } else {
        $errorArray[] = 'PageName is required.';
    }
    if (empty($_POST["headline"]) != true) {
        $headline = ValidationController::validateInput($_POST["headline"]);
    } else {
        $errorArray[] = 'Headline is required.';
    }
    if (empty($_POST["content"]) != true) {
        $content = ValidationController::validateInput($_POST["content"]);
    } else {
        $errorArray[] = 'Content is required.';
    }
    $id = ValidationController::validateInput($_POST["id"]);
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/updatepagecontent.php'>go back</a> and enter information again!</h4>";
    } else {
        $pageContent = new PageContent($id, $pageName, $headline, $content);
        if (ContentController::updatePageContent($pageContent)) {
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/protected/view";
            $extra = 'pagemanagement.php';
            header("Location: http://$host$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Page could not be updated';
        }
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../view/updatepagecontent.php'>go back</a> and try again!</h4>";
    }
}