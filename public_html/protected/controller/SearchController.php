<?php

namespace SearchController\SearchController;
use Database\MySQLService\MySQLService;

class SearchController
{
    protected $searchResults;

    public function searchBooks($input){
        $sql = new MySQLService();
        $sql->listItemsForSharerSQL();

    }
}