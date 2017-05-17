<?php
require_once __DIR__. "/../database/MySQLService.php";

/**
 * Controller-Class SearchController
 */
class SearchController {
    /**
     * @param $input
     * @return array
     */
    public static function searchBooks($input){
        $mysqlService = new MySQLService();
        if ($mysqlService->connect()) {
            return $mysqlService->getBooksByTitleOrAuthor($input);
        }
        return null;
    }
}