<?php

namespace cs313\Condominium\Infrastructure;

use cs313\Condominium\Model\SharedArea\SharedArea;
use cs313\Condominium\Model\SharedArea\SharedAreaDTO;
use cs313\Condominium\Model\SharedArea\SharedAreaList;
use cs313\Condominium\Model\SharedArea\SharedAreaRepositoryInterface;

class SharedAreaRepository extends Repository implements SharedAreaRepositoryInterface
{
    /**
     * @param SharedAreaDTO $filter
     * @return array|\cs313\Condominium\Model\SharedArea\SharedAreaList|void
     */
    public function findAll(SharedAreaDTO $filter): SharedAreaList
    {
        $sql = 'SELECT * FROM condominium.shared_area where id is not null';

        if ($filter->getId()) {
            $sql .= ' and id = ' . $filter->getId();
        }

        if ($filter->getName()) {
            $sql .= ' and ds_name like \'%' . $filter->getName() . '%\'';
        }

        $statement = $this->executeStatement($sql);

        $result = $statement->fetchAll(\PDO::FETCH_CLASS, SharedArea::class);
        var_dump($result);
        exit;
    }

    public function findOne(SharedAreaDTO $filter): SharedArea
    {
        // TODO: Implement findOne() method.
    }


    public function findById(int $id): SharedArea
    {
        // TODO: Implement findById() method.
    }
}
