<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/webdev/public_html/protected/database/MySQLService.php";

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
     * @param $galleryID
     * @param $images
     * @return bool
     * @internal param $imageGalleryName
     */
    public static function updateImageGallery($galleryID, $images): bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->updateImageGallery($galleryID, $images);
        }
        return null;
    }

    /**
     * @param $imageGalleryName
     * @param $state
     * @return bool
     */
    public static function updateImageGalleryVisibility($imageGalleryName, $state): bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->updateImageGalleryVisibility($imageGalleryName, $state);
        }
        return null;
    }

    /**
     * @return array|null
     */
    public static function getAllGalleries(): ?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getAllGalleries();
        }
        return null;
    }

    /**
     * @return array|null
     */
    public static function getGalleryNames(): ?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getGalleryNames();
        }
        return null;
    }

    //TODO JUUL entity
    public static function getGalleryVisibilityByPageName($pageName) : ?Gallery {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getGalleryVisibilityByPageName($pageName);
        }
        return null;
    }
}