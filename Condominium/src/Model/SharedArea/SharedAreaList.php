<?php


namespace cs313\Condominium\Model\SharedArea;


class SharedAreaList
{
    private $list;

    public function __construct(SharedAreaDTO $filter, SharedAreaRepositoryInterface $repository)
    {
        $result = $repository->findAll($filter);

        $this->list = $result;
    }

    public function getList()
    {
        return $this->list;
    }
}