<?php
use Entities\Book;
require "DatabaseModel.php";

class MySQLService
{

//Todo: method signature
    public static function connect()
    {
        $adapter = DatabaseModel::getAdapter();
        return $adapter; //TODO Jul Implementation
    }


//Todo PHKO: Create Database connection with getAdapter(); and query all available books with levenstein

    /**
     * @param $input
     * @return array
     */
    public static function getAllBooksByTitleOrAuthor($input): array
    {
        return null;
    }

//Todo PHKO: Create Database connection with getAdapter(); and query all available books with levenstein

    /**
     * @param $input
     * @return array
     */
    public static function getAvailableBooksByTitleOrAuthor($input): array
    {
        return null;
    }
}