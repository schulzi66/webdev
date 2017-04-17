<?php
require_once "../controller/ImageGalleryController.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['image-gallery'])) {
        //TODO juls
    }

    if (isset($_GET['image-gallery-visibility'])) {
        //TODO juls
    }
}