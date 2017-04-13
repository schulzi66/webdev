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

    //TODO MASC NEEDED?
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

    /**
     * @param $book
     * @return bool
     */
    public static function addBook($book) : bool{
        $sqlService = new MySQLService();
        if ($sqlService->connect()){
            return $sqlService->addBook($book);
        }
        return false;
    }

    /**
     * @param $book
     * @return bool
     */
    public static function deleteBook($bookId) : bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()){
            return $sqlService->deleteBook($bookId);
        }
        return false;
    }

    /**
     * @param $book
     * @return bool
     */
    public static function updateBook($book) : bool {
        $sqlService = new MySQLService();
        if ($sqlService->connect()){
            return $sqlService->updateBook($book);
        }
        return false;
    }
}