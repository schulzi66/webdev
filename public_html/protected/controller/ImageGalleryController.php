<?php


class ImageGalleryController
{

    public static function getImages() :?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getImages();
        }
        return null;
    }

    public static function setImageGalleryImages() :bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->setImageGalleryImages();
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