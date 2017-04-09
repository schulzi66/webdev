<?php

namespace Controller;
use Database\MySQLService;
use Entities\Book;

class SearchController
{
    protected $searchResults;

    //Todo PHKO: method to call from form and return an array of type books, see the fake implementation;

    /**
     * @param $input
     * @return array
     */
    public function searchBooks($input) : array {
        $sql = new MySQLService();
        //TODO or other method
        $sql->getAllBooksByTitleOrAuthor($input);

        $book = new Book("sadf", "df", "masd", "fsa", "asdf", "d");

        $book2 = new Book("sadf", "df", "masd", "fsa", "asdf", "d");


        $books = array($book, $book2);
        return $books;

    }
}