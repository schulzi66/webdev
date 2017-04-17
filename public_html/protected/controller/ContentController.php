<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/webdev/public_html/protected/database/MySQLService.php";

class ContentController {
    /**
     * @param $pageName
     * @return null|PageContent
     */
    public static function getContentByPageName($pageName) : ?PageContent {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getContentByPageName($pageName);
        }
        return null;
    }

    /**
     * @return array|null
     */
    public static function getAllPageContents() : ?array {
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
    public static function updatePageContent($pageContent) : bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->updatePageContent($pageContent);
        }
        return false;
    }
}