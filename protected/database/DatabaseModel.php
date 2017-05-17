<?php
require "ConnectionFactory.php";

/**
 * Class DatabaseModel
 * Simple model which is required to access the connection factory (MVC concept)
 */
class DatabaseModel {

    /**
     * @return mysqli
     */
    public static function getAdapter(){
        $connection = new ConnectionFactory();
        return $connection->getConnection();
    }
}