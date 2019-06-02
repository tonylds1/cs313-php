<?php


namespace cs313\Condominium\Model\SharedArea;


use cs313\Condominium\Infrastructure\Persistence;

class SharedAreaList
{
    private $list;

    public function __construct(SharedAreaDTO $filter)
    {

        $

        $statement = $db->prepare($sql);
        $statement->execute();

        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC))
        {
            $result[] = new SharedArea($row['id'], $row['ds_name']);
        }

        $this->list = $result;
    }

    public function getList()
    {
        return $this->list;
    }
}