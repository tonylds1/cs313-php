<?php

namespace cs313\Condominium\Infrastructure;

use cs313\Condominium\Model\SharedArea\SharedArea;
use cs313\Condominium\Model\SharedArea\SharedAreaDTO;
use cs313\Condominium\Model\SharedArea\SharedAreaRepositoryInterface;

class SharedAreaRepository extends Repository implements SharedAreaRepositoryInterface
{
    /**
     * @param SharedAreaDTO $filter
     * @return array
     */
    public function findAll(SharedAreaDTO $filter): array
    {
        $sql = 'SELECT * FROM condominium.shared_area where id is not null';

        if ($filter->getId()) {
            $sql .= ' and id = ' . $filter->getId();
        }

        if ($filter->getName()) {
            $sql .= ' and lower(ds_name) like lower(\'%' . $filter->getName() . '%\')';
        }

        $statement = $this->executeStatement($sql);

        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC))
        {
            $result[] = new SharedArea($row['id'], $row['ds_name']);
        }

        return $result;
    }

    /**
     * @param SharedAreaDTO $filter
     * @return SharedArea|null
     */
    public function findOne(SharedAreaDTO $filter): ?SharedArea
    {
        return current($this->findAll($filter));
    }

    /**
     * @param int $id
     * @return SharedArea|null
     */
    public function findById(int $id): ?SharedArea
    {
        $sql = 'SELECT * FROM condominium.shared_area where id = '. $id;
        $statement = $this->executeStatement($sql);
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        if ($row) {
            return new SharedArea($row['id'], $row['ds_name']);
        }

        return null;
    }

    public function delete(int $id)
    {
        $sql = 'Delete from condominium.shared_area where id = '. $id;
        $this->executeStatement($sql);
    }

    public function update(SharedAreaDTO $sharedAreaDTO)
    {
        if (!$sharedAreaDTO->getName()) {
            return;
        }

        $sql = 'UPDATE condominium.shared_area '.
            'SET ds_name = \''. $sharedAreaDTO->getName(). '\' '.
            'WHERE id = '. $sharedAreaDTO->getId()
        ;
        
        $this->executeStatement($sql);
    }

    public function insert(SharedAreaDTO $sharedAreaDTO)
    {
        if (!$sharedAreaDTO->getName()) {
            return;
        }

        $sql = 'INSERT INTO condominium.shared_area '.
            '(ds_name) VALUES (\''.$sharedAreaDTO->getName().'\')';

        $this->executeStatement($sql);
    }
}
