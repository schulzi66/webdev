<?php

namespace Database;

/**
 * Class DatabaseModel
 * @package Database
 */
class DatabaseModel {
    protected static function getAdapter() {
        $connection = new ConnectionFactory();
        return $connection->getConnection();
    }
}