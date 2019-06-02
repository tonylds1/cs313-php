<?php

namespace cs313\Condominium\Infrastructure;

abstract class Repository
{
    public function findAll(string $sql, string $entity)
    {
        $statement = $this->executeStatement($sql);

        return $statement->fetchAll(\PDO::FETCH_CLASS, $entity);
    }

    public function findOne(string $sql, string $entity)
    {
        $statement = $this->executeStatement($sql);

        return $statement->fetch(\PDO::FETCH_CLASS, $entity);
    }

    private function executeStatement(string $sql)
    {
        $db = $this->getConection();

        $statement = $db->prepare($sql);
        $statement->execute();

        return $statement;
    }

    private function getConection()
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
