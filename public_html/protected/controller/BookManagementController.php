<?php
require "../database/MySQLService.php";

class BookManagementController
{
    /**
     * @return array|null
     */
    public static function getAllBooks() : ?array {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getAllBooks();
        }
        return null;
    }

    /**
     * @param $id
     * @return Book|null
     */
    public static function getBookById($id) : ?Book {
        $sqlService = new MySQLService();
        if ($sqlService->connect()){
            return $sqlService->getBookById($id);
        }
        return null;
    }
}