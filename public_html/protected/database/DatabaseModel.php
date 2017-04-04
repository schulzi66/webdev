<?php

namespace Database;
use Database\ConnectionFactory;

/**
 * Class DatabaseModel
 * @package Database
 */
class DatabaseModel {
    protected function getAdapter() {
        $connection = new ConnectionFactory();
        return $connection->getConnection();
    }
}