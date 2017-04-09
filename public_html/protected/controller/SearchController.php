<?php
use Entities\Book;
require "../database/MySQLService.php";
class SearchController
{
    protected $searchResults;

    //Todo PHKO: method to call from form and return an array of type books, see the fake implementation;

    /**
     * @param $input
     * @return array
     */
    public static function searchBooks($input) : array {
        //TODO or other method
        MySQLService::getAllBooksByTitleOrAuthor($input);

        $book = new Book("sadf", "df", "masd", "fsa", "asdf", "d");

        $book2 = new Book("sadf", "df", "masd", "fsa", "asdf", "d");


        $books = array($book, $book2);
        return $books;

    }
}