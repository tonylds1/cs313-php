<?php


namespace cs313\Condominium\Model\SharedArea;


use cs313\Condominium\Infrastructure\Persistence;

class SharedAreaList
{
    private $list;

    public function __construct(SharedAreaDTO $filter)
    {
        $db = (new Persistence())->getConection();

        $sql = 'SELECT * FROM condominium.shared_area where id is not null';

        if ($filter->getId()) {
            $sql .= ' and id = '. $filter->getId();
        }

        if ($filter->getName()) {
            $sql .= ' and ds_name like %'. $filter->getName() . '%';
        }

        $statement = $db->prepare($sql);
        $statement->execute();

        $result = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
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