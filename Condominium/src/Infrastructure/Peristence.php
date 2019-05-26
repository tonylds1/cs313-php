<?php

namespace cs313\Condominium\Infrastructure;


class Persistence
{
    public function getConection()
    {
        $server = 'ec2-54-83-205-27.compute-1.amazonaws.com:5432';
        $database = 'd8fg9vkqm6jfs';
        $user = 'mrxfucsllijjls';
        $password = "d32b81e28c9789e5dfeb8f32ef9f868aa22a438936475431f19ffc8aa32cb8f1";
        $dsn = "pgsql:host=$server;dbname=$database";
        $options = array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);

        try {

            return new \PDO($dsn, $user, $password, $options);
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }
    }

}