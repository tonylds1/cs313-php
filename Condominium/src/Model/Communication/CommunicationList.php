<?php


namespace cs313\Condominium\Model\Communication;

class CommunicationList
{
    private $list;

    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public function getList()
    {
        return $this->list;
    }
}