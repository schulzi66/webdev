<?php
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once __DIR__. "/../database/MySQLService.php";

/**
 * Controller-Class ImageGalleryController
 */
class ImageGalleryController {
    /**
     * @return array|null
     */
    public static function getImages() {
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
    public static function updateImageGallery($galleryID, $images){
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
    public static function updateImageGalleryVisibility($imageGalleryName, $state){
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->updateImageGalleryVisibility($imageGalleryName, $state);
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

    /**
     * @return array|null
     */
    public static function getGalleryNames(){
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
    public static function getGalleryVisibilityByPageName($pageName) {
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
    public static function getGalleryImagesByGalleryID($galleryID) {
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
    public static function getImageIdsByImageNames($imageNames){
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
    public static function getGalleryIdByGalleryName($galleryName){
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
    public static function getImageNamesByImageIds($ids) {
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
    public static function getGalleryImageIdsByGalleryID($ids) {
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
    public static function getImageById($id) {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getImageById($id);
        }
        return null;
    }
}