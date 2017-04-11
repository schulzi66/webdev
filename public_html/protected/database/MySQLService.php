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
        if ($this->getConnection()){
            $userName = mysqli_real_escape_string($connection, $credentials["userName"]);
            $password = mysqli_real_escape_string($connection, $credentials["password"]);
            $sql = "SELECT * FROM users WHERE Binary UserName = '". $userName . "' AND Binary Password = '" . $password . "';";
            $result = mysqli_query($connection, $sql);
            if ($result -> num_rows == 1){
                $result = mysqli_fetch_assoc($result);
                return new User($result["UserName"], null);
            }
            return null;
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