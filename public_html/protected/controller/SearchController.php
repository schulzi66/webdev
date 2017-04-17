<?php
require_once "../database/MySQLService.php";

class SearchController {
    protected $searchResults;

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