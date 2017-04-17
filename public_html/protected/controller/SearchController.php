<?php
require_once "../database/MySQLService.php";

class SearchController {
    //TODO PHKO: neeeded because the value is will never be != null
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