<?php

namespace cs313\Condominium\Infrastructure;

abstract class Repository
{
    /**
     * @param string $sql
     * @return bool|\PDOStatement
     */
    protected function executeStatement(string $sql)
    {
        $db = $this->getConection();

        $statement = $db->prepare($sql);
        $statement->execute();

        return $statement;
    }

    protected function getConection()
    {
        try {
            $dbUrl = getenv('DATABASE_URL');

            $dbopts = parse_url($dbUrl);
            $dbHost = $dbopts["host"];
            $dbPort = $dbopts["port"];
            $dbUser = $dbopts["user"];
            $dbPassword = $dbopts["pass"];
            $dbName = ltrim($dbopts["path"],'/');

            $db = new \PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
            $db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );

            return $db;
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }
    }
}
