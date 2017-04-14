<?php
require "DatabaseModel.php";
require "../entities/User.php";
require "../entities/Book.php";
class MySQLService
{
    private $connection;

    #region Getter and Setter
    /**
     * @param mixed $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }
    #endregion

    /**
     * @return bool
     */
    public function connect() : bool
    {
        $this->setConnection(DatabaseModel::getAdapter());

        if ($this->getConnection()){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * @param $credentials
     * @return null|User
     */
    public function getUserFromDatabase($credentials) : ?User
    {
        $connection = $this->getConnection();
        if ($connection){
            $userName = mysqli_real_escape_string($connection, $credentials["userName"]);
            $password = mysqli_real_escape_string($connection, $credentials["password"]);
            $sql = "SELECT * FROM users WHERE Binary UserName = '". $userName . "' AND Binary Password = '" . $password . "';";
            $result = mysqli_query($connection, $sql);
            if ($result -> num_rows == 1){
                $result = mysqli_fetch_assoc($result);
                return new User($result["UserID"], $result["UserName"]);
            }
        }
        return null;
    }

    /**
     * @return array|null
     */
    public function getAllBooks() : ?array
    {
        $connection = $this->getConnection();
        if ($connection){
            $sql = "Select * From books";
            $result = mysqli_query($connection, $sql);
            if ($result -> num_rows >= 1){
                $bookArray = $result->fetch_all();
                return $bookArray;
            }
        }
        return null;
    }

    /**
     * @param $id
     * @return Book|null
     */
    public function getBookById($id) : ?Book
    {
        $connection = $this->getConnection();
        if ($connection){
            $sql = "Select * From books WHERE ID = '" . $id . "';";
            $result = mysqli_query($connection, $sql);
            if ($result -> num_rows == 1){
                $result = $result->fetch_assoc();
                $book = new Book($result["ID"],$result["Title"], $result["Author"], $result["ISBN"], $result["Category"], $result["LoanID"]);
                return $book;
            }
        }
        return null;
    }

    /**
     * @param $book
     * @return bool
     */
    public function addBook($book) : bool
    {
        $connection = $this->getConnection();
        if ($connection){
            $title = mysqli_real_escape_string($connection, $book->getTitle());
            $author = mysqli_real_escape_string($connection, $book->getAuthor());
            $isbn = mysqli_real_escape_string($connection, $book->getIsbn());
            $category = mysqli_real_escape_string($connection, $book->getCategory());
            $sql = "INSERT INTO books (ID,  Title, Author, ISBN, Category, LoanID) VALUES (DEFAULT , '$title', '$author', '$isbn', '$category', NULL )";
            $result = mysqli_query($connection, $sql);
            return $result;
        }
        return false;
    }

    /**
     * @param $bookId
     * @return bool
     */
    public function deleteBook($bookId) : bool
    {
        $connection = $this->getConnection();
        if ($connection){
            $result = $connection->query("DELETE FROM books WHERE ID = " . $bookId. ";");
            if ($result){
                $connection->query("ALTER TABLE books AUTO_INCREMENT = " . $bookId . ";");
            }
            return $result;
        }
        return false;
    }

    public function updateBook($book): bool
    {

        $connection = $this->getConnection();
        if ($connection) {
            $id = mysqli_real_escape_string($connection, $book->getId());
            $title = mysqli_real_escape_string($connection, $book->getTitle());
            $author = mysqli_real_escape_string($connection, $book->getAuthor());
            $isbn = mysqli_real_escape_string($connection, $book->getIsbn());
            $category = mysqli_real_escape_string($connection, $book->getCategory());

            $sql = $connection->prepare("UPDATE books SET Title=?, Author=?, ISBN=?, Category=? WHERE ID=?");
            $sql->bind_param('ssssi', $title, $author, $isbn, $category, $id);

            $result = $sql->execute();
            return $result;
        }
        return false;
    }


    /**
     * @param $input
     * @return array
     */
    public function getBooksByTitleOrAuthor($input): ?array
    {
        $connection = $this->getConnection();
        if($connection) {
            if ($input["bookTitle"] != "" && $input["bookAuthor"] != "" && $input["notLoaned"] == "on") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $input["bookTitle"] . "%' AND Author LIKE '%"
                    . $input["bookAuthor"] . "%' AND LoanID IS NULL;";
            } else if ($input["bookTitle"] != "" && $input["bookAuthor"] != "") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $input["bookTitle"] . "%' AND Author LIKE '%"
                    . $input["bookAuthor"] . "%';";
            } else if ($input["bookTitle"] != "" && $input["notLoaned"] == "on") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $input["bookTitle"] . "%' AND LoanID IS NULL;";
            } else if ($input["bookTitle"] != "") {
                $sql = "SELECT * FROM books WHERE Title LIKE '%" . $input["bookTitle"] . "%';";
            } else if ($input["bookAuthor"] != "" && $input["notLoaned"] == "on") {
                    $sql = "SELECT * FROM books WHERE Author LIKE '%" . $input["bookAuthor"] . "%' AND LoanID IS NULL;";
            } else if ($input["bookAuthor"] != "") {
                $sql = "SELECT * FROM books WHERE Author LIKE '%" . $input["bookAuthor"] . "%';";
            } else {
                return null;
            }
            $result = mysqli_query($connection, $sql);
            if($result -> num_rows > 0)
            {
                $resultArray = $result->fetch_all();
                $bookArray = Array();
                foreach($resultArray as &$book)
                {
                    array_push($bookArray, new Book($book["0"],$book["1"], $book["2"], $book["3"], $book["4"], $book["5"]));
                }
                return $bookArray;
            }
        }
        return null;
    }
}