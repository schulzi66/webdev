<?php
require_once "../controller/ImageGalleryController.php";
require_once "../controller/SessionController.php";
require_once "../controller/ValidationController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['update-gallery']) && isset($_GET['values'])) {
        $values = ValidationController::validateInputArray(json_decode($_GET["values"]));
        $galleryID = ValidationController::validateInput($_GET['update-gallery']);

        $imageIds = ImageGalleryController::getImageIdsByImageNames($values);

        if (ImageGalleryController::updateImageGallery($galleryID, $imageIds)) {
            //redirect to overview
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/protected/view";
            $extra = 'imagegallery.php';
            header("Location: http://$host$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Visibility could not be updated';
        }

        if (ValidationController::checkForErrors($errorArray)) {
            echo "<h4>Please <a href='../view/imagegallery.php'>go back</a> and try again!</h4>";
        }
    }

    if (isset($_GET['image-gallery-visibility']) && isset($_GET['state'])) {

        $visibility = ValidationController::validateInput($_GET['image-gallery-visibility']);
        $state = ValidationController::validateInput($_GET['state']);

        //Call ImageGalleryController to update database field
        if (ImageGalleryController::updateImageGalleryVisibility($visibility, $state)) {
            //redirect to overview
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/Webdev/public_html/protected/view";
            $extra = 'imagegallery.php';
            header("Location: http://$host$uri/$extra");
            exit;
        } else {
            $errorArray[] = 'Visibility could not be updated';
        }

        if (ValidationController::checkForErrors($errorArray)) {
            echo "<h4>Please <a href='../view/imagegallery.php'>go back</a> and try again!</h4>";
        }
    }
}