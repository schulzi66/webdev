<?php
require_once __DIR__ . "/../database/MySQLService.php";

/**
 * Controller-Class BookManagementController
 */
class BookManagementController {
    /**
     * @return array|null
     */
    public static function getAllBooks() {
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
    public static function getBookById($id) {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->getBookById($id);
        }
        return null;
    }

    /**
     * @param $book
     * @return bool
     */
    public static function addBook($book){
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->addBook($book);
        }
        return false;
    }

    /**
     * @param $bookId
     * @return bool
     */
    public static function deleteBook($bookId){
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->deleteBook($bookId);
        }
        return false;
    }

    /**
     * @param $book
     * @return bool
     */
    public static function updateBook($book) {
        $sqlService = new MySQLService();
        if ($sqlService->connect()) {
            return $sqlService->updateBook($book);
        }
        return false;
    }
}