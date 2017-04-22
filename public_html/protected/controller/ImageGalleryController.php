<?php
//TODO: Image-Sliders sollten eine festvorgeschriebene Größe haben (Slider skaliert aktuell mit Bildergröße, sieht kacke aus). Außerdem sollten die Bilder zentriert im Slider sein
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/webdev/public_html/protected/database/MySQLService.php";

/**
 * Controller-Class ImageGalleryController
 */
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

    /**
     * @param $pageName
     * @return Gallery|null
     */
    public static function getGalleryVisibilityByPageName($pageName) : ?Gallery {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getGalleryVisibilityByPageName($pageName);
        }
        return null;
    }

    /**
     * @param $galleryID
     * @return array|null
     */
    public static function getGalleryImagesByGalleryID($galleryID): ?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getGalleryImagesByGalleryID($galleryID);
        }
        return null;
    }

    /**
     * @param $imageNames
     * @return array|null
     */
    public static function getImageIdsByImageNames($imageNames): ?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getImageIdsByImageNames($imageNames);
        }
        return null;
    }

    /**
     * @param $galleryName
     * @return int|null
     */
    public static function getGalleryIdByGalleryName($galleryName): int {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getGalleryIdByGalleryName($galleryName);
        }
        return null;
    }

    /**
     * @param $ids
     * @return array|null
     */
    public static function getImageNamesByImageIds($ids): ?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getImageNamesByImageIds($ids);
        }
        return null;
    }

    /**
     * @param $ids
     * @return array|null
     */
    public static function getGalleryImageIdsByGalleryID($ids): ?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getGalleryImageIdsByGalleryID($ids);
        }
        return null;
    }

    /**
     * @param $id
     * @return array|null
     */
    public static function getImageById($id) : ?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getImageById($id);
        }
        return null;
    }
}