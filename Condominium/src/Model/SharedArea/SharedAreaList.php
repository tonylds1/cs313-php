<?php


namespace cs313\Condominium\Model\SharedArea;


class SharedAreaList
{
    private $list;

    public function __construct(SharedAreaDTO $filter, SharedAreaRepositoryInterface $repository)
    {
        $this->list = $repository->findAll($filter);
    }

    public function getList()
    {
        return $this->list;
    }
}