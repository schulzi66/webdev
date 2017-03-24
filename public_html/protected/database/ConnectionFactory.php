<?php

namespace Database\ConnectionFactory;
/**
 * Created by PhpStorm.
 * User: Julian
 * Date: 24/03/2017
 * Time: 9:37 AM
 */
class ConnectionFactory {
    protected static $connection;


    public function getConnection() {
        if(self::$connection) {
            self::$connection = new PDO("mysql:");
        }
    }

    private function loadConfiguration($file = 'database.ini') {
        //TODO
    }
}