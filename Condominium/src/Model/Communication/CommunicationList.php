<?php


namespace cs313\Condominium\Model\Communication;

class CommunicationList
{
    private $list;

    public function __construct(CommunicationDto $filter, CommunicationRepositoryInterface $repository)
    {
        $this->list = $repository->findAll($filter);
    }

    public function getList()
    {
        return $this->list;
    }
}