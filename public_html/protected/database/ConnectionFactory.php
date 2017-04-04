<?php

namespace Database\ConnectionFactory;

use Exception;
use mysqli;

class ConnectionFactory
{
    protected static $connection;


    public function getConnection()
    {
        if (self::$connection) {
            try {
                $dbConfig = $this->loadConfiguration();

                self::$connection = new mysqli($dbConfig["host"], $dbConfig["username"], $dbConfig["password"]);
                return self::$connection;
            } catch(Exception $e) {
                echo 'Connection failed ' . $e->getMessage();
            }
        }
    }

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