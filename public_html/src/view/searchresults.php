<?php
require_once "../../protected/entities/Book.php";
$books = unserialize($_GET["result-books"]);
var_dump($books);