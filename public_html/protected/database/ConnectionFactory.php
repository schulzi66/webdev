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
    public function getConnection()
    {
//        if (self::$connection) {
            try {
                // Set the database access information as constants...
                DEFINE ('DB_USER', 'root');
                DEFINE ('DB_PASSWORD', '');
                DEFINE ('DB_HOST', 'localhost');
                DEFINE ('DB_NAME', 'webdev');

                // Make the connection...
                $db_connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                OR die ('Could not connect to MySQL! ' . mysqli_connect_error());

                // Set the encoding...
                mysqli_set_charset($db_connection, 'utf8');

                return $db_connection;
            } catch(Exception $e) {
                echo 'Connection failed ' . $e->getMessage();
            }
            return null;
//        }
    }

    /**
     * @param string $file
     * @return array
     */
    private function loadConfiguration($file = 'database.ini')
    {
        $settings = parse_ini_file($file, TRUE);

        $host = $settings['database']['host'];
        $username = $settings['database']['username'];
        $password = $settings['database']['password'];

        $dbConfig = array('host' => $host, 'username' => $username, 'password' => $password);

        return $dbConfig;
    }
}