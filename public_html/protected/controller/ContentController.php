<?php
require "../../protected/database/MySQLService.php";

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
}