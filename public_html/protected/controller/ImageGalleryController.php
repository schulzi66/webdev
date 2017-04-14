<?php


class ImageGalleryController
{

    public static function getAllImages() :?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getAllImages();
        }
        return null;
    }

    public static function setImageGalleryImages() :bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->setImagesForSlider();
        }
        return null;
    }

    public static function updateImageGallery($imageGalleryName) :bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->updateImageGallery($imageGalleryName);
        }
        return null;
    }
}