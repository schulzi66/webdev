<?php

namespace Database\ConnectionFactory;

use PDO;
use PDOException;

/**
 * Created by PhpStorm.
 * User: Julian
 * Date: 24/03/2017
 * Time: 9:37 AM
 */
class ConnectionFactory
{
    protected static $connection;


    public function getConnection()
    {
        if (self::$connection) {
            try {
                $dbConfig = $this->loadConfiguration();

                self::$connection = new PDO($dbConfig["dns"], $dbConfig["username"], $dbConfig["password"] );
            } catch(PDOException $e) {
                echo 'Connection failed ' . $e->getMessage();
            }
        }
    }

    private function loadConfiguration($file = 'database.ini')
    {
        $settings = parse_ini_file($file, TRUE);

        $dns = $settings['database']['driver'] . ':host=' . $settings['database']['host'] .
            ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
            ';dbname=' . $settings['database']['schema'];

        $username = $settings['database']['username'];
        $password = $settings['database']['password'];

        $dbConfig = array('dns' => $dns, 'username' => $username, 'password' => $password);

        return $dbConfig;
    }
}