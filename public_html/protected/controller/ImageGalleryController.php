<?php

class ImageGalleryController {
    /**
     * @return array|null
     */
    public static function getImages():?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getImages();
        }
        return null;
    }

    /**
     * @param $images
     * @return bool
     */
    public static function setImageGalleryImages($images): bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->setImageGalleryImages($images);
        }
        return null;
    }

    /**
     * @param $imageGalleryName
     * @return bool
     */
    public static function updateImageGallery($imageGalleryName, $images): bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->updateImageGallery($imageGalleryName, $images);
        }
        return null;
    }

    /**
     * @return array|null
     */
    public static function getAllGalleries() {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getAllGalleries();
        }
        return null;
    }
}