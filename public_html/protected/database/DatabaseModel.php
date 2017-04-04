<?php

namespace Database\DatabaseModel;
use Database\ConnectionFactory\ConnectionFactory;


class DatabaseModel {
    protected function getAdapter() {
        $connection = new ConnectionFactory();
        return $connection->getConnection();
    }
}