<?php
require_once "../database/MySQLService.php";

/**
 * Controller-Class SearchController
 */
class SearchController {
    /**
     * @param $input
     * @return array
     */
    public static function searchBooks($input): ?array {
        $mysqlService = new MySQLService();
        if ($mysqlService->connect()) {
            return $mysqlService->getBooksByTitleOrAuthor($input);
        }
        return null;
    }
}