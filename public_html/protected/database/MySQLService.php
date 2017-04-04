<?php

namespace Database;

use Database\DatabaseModel;
use Entities\Book;


class MySQLService extends DatabaseModel
{

    public function listItemsForSharerSQL()
    {
        $this->getAdapter();
        $items = "";
        return $items; //TODO Jul Implementation
    }


//Todo PHKO: Create Database connection with getAdapter(); and query all available books with levenstein

    /**
     * @param $input
     * @return Book
     */
    public function getAllBooksByTitleOrAuthor($input): Book
    {

    }

//Todo PHKO: Create Database connection with getAdapter(); and query all available books with levenstein

    /**
     * @param $input
     * @return Book
     */
    public function getAvailableBooksByTitleOrAuthor($input): Book
    {

    }
}