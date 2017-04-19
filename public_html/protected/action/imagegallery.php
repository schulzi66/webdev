<?php
require_once "../controller/ImageGalleryController.php";
require_once "../controller/SessionController.php";
require_once "../controller/ValidationController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['image-gallery'])) {
        //$data = json_decode($_GET["values"]);
    }

    if (isset($_GET['image-gallery-visibility'])) {

        //TOdO JUUL validation controller usen and variables usen
        ValidationController::validateInput($_GET['image-gallery-visibility']);
        ImageGalleryController::updateImageGalleryVisibility($_GET['image-gallery-visibility'], $_GET['state']);
    }
}