<?php

/**
 * Class ConnectionFactory
 * @package Database
 */
class ConnectionFactory
{
    protected static $connection;


    /**
     * @return mysqli
     */
    public function getConnection() : mysqli
    {
        try {
            $config = $this->loadConfiguration();
            // Make the connection
            $db_connection = @mysqli_connect($config["host"], $config["username"], $config["password"], $config["database"])
            OR die ('Could not connect to MySQL! ' . mysqli_connect_error());

            // Set the encoding
            mysqli_set_charset($db_connection, 'utf8');

            return $db_connection;
        } catch(Exception $e) {
            echo 'Connection failed ' . $e->getMessage();
        }
        return null;
    }

    /**
     * @param string $file
     * @return array
     */
    private function loadConfiguration($file = 'database.ini') : array
    {
        $settings = parse_ini_file($file, TRUE);

        $host = $settings['database']['host'];
        $username = $settings['database']['username'];
        $password = $settings['database']['password'];
        $database = $settings['database']['database'];

        $dbConfig = array('host' => $host, 'username' => $username, 'password' => $password, 'database' => $database);

        return $dbConfig;
    }
}