<?php
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//require_once (dirname(__FILE__).'/../database/MySQLService.php');
require_once __DIR__. '/../database/MySQLService.php';

/**
 * Controller-Class ContentController
 */
class ContentController {
    /**
     * @param $pageName
     * @return null|PageContent
     */
    public static function getContentByPageName($pageName){
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getContentByPageName($pageName);
        }
        return null;
    }

    /**
     * @return array|null
     */
    public static function getAllPageContents() {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getAllPageContents();
        }
        return null;
    }

    /**
     * @param $pageContent
     * @return bool
     */
    public static function updatePageContent($pageContent){
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->updatePageContent($pageContent);
        }
        return false;
    }
}