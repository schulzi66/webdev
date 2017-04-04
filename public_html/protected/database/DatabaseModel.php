<?php

namespace Database;
use Database\ConnectionFactory;


class DatabaseModel {
    protected function getAdapter() {
        $connection = new ConnectionFactory();
        return $connection->getConnection();
    }
}