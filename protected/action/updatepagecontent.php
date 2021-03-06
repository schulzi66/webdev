<?php
require_once __DIR__ . "/../controller/ValidationController.php";
require_once __DIR__ . "/../controller/ContentController.php";
require_once __DIR__ . "/../entities/PageContent.php";
require_once __DIR__ . "/../controller/SessionController.php";

/**
 * Validate session before executing action
 */
SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorArray = array();
    $id = "";
    $pageName = "";
    $headline = "";
    $content = "";
    //check if all required fields are set
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
    $id = ValidationController::validateInput($_POST["ID"]);

    //check for errors
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../../public/view/updatepagecontent.php'>go back</a> and enter information again!</h4>";
    } else {
        //no errors
        //create new page content object
        $pageContent = new PageContent($id, $pageName, $headline, $content);
        //call to controller
        if (ContentController::updatePageContent($pageContent)) {
            //redirect to overview
            $host = $_SERVER['HTTP_HOST'];
            $uri = "webdev/public/view";
            $arr = explode('htdocs', __DIR__);
            $path = substr($arr[1], 0, strpos($arr[1], 'webdev'));
            $extra = 'pagemanagement.php';
            header("Location: http://$host$path$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Page could not be updated';
        }
    }
    if (ValidationController::checkForErrors($errorArray)) {
        echo "<h4>Please <a href='../../public/view/updatepagecontent.php'>go back</a> and try again!</h4>";
    }
}