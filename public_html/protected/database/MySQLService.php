<?php
require "DatabaseModel.php";
require "../entities/User.php";
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
    public function connect() : boolean
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
     */
    public function getUserFromDatabase($credentials) : User
    {
        $connection = $this->getConnection();
        if ($this->getConnection()){
//            $result = $connection->query("Select * From member");
            $query = "SELECT * FROM member WHERE Firstname=? AND Surname=?";
            $statement = $connection->prepare($query);
            $statement->bind_param('ss', $credentials["userName"], $credentials["password"]);
            $result = $statement->execute();
//            $statement->bind_result($Firstname, $Lastname);
            $user = new User($result["Firstname"], $result["Surname"]);
            return $user;
//            $sql =  "SELECT * FROM member WHERE Firstname = ". $credentials["userName"] .";";
        }
        else  {
            return null;
        }
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