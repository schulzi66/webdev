<?php

namespace Database;

use Database\DatabaseModel as DatabaseModel;
use Entities\Book;


class MySQLService extends DatabaseModel
{

    /**
     * MySQLService constructor.
     */
    public function __construct()
    {
    }

//Todo: method signature
    public static function connect()
    {
        DatabaseModel::getAdapter();
//        $this->getAdapter();
        $items = "";
        return $items; //TODO Jul Implementation
    }


//Todo PHKO: Create Database connection with getAdapter(); and query all available books with levenstein

    /**
     * @param $input
     * @return array
     */
    public function getAllBooksByTitleOrAuthor($input): array
    {
        return null;
    }

//Todo PHKO: Create Database connection with getAdapter(); and query all available books with levenstein

    /**
     * @param $input
     * @return array
     */
    public function getAvailableBooksByTitleOrAuthor($input): array
    {
        return null;
    }
}