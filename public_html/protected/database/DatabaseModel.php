<?php
require "ConnectionFactory.php";

/**
 * Class DatabaseModel
 * @package Database
 */
class DatabaseModel {

    public static function getAdapter() {
        $connection = new ConnectionFactory();
        return $connection->getConnection();
    }
}