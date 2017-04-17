<?php
require "ConnectionFactory.php";

/**
 * Class DatabaseModel
 * @package Database
 */
class DatabaseModel {

    /**
     * @return mysqli
     */
    public static function getAdapter() : mysqli{
        $connection = new ConnectionFactory();
        return $connection->getConnection();
    }
}