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
                $user = "";
                $password = "";

                self::$connection = new PDO($dbConfig, $user, $password );
            } catch(PDOException $e) {
                echo 'Connection failed ' . $e->getMessage();
            }
        }
    }

    private function loadConfiguration($file = 'database.ini')
    {
        $settings = parse_ini_file($file, TRUE);

        $dbConfig = $settings['database']['driver'] . ':host=' . $settings['database']['host'] .
            ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
            ';dbname=' . $settings['database']['schema'];
        return $dbConfig;
    }
}