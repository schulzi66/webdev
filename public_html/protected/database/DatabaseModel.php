<?php

namespace Database\DatabaseModel;

/**
 * Created by PhpStorm.
 * User: Julian
 * Date: 24/03/2017
 * Time: 9:34 AM
 */
class DatabaseModel {
    protected function getAdapter() {
        $connection = new ConnectionFactory();
        return $connection->getConnection();
    }
}