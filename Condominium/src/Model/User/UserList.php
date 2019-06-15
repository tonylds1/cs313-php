<?php


namespace cs313\Condominium\Model\User;

class UserList
{
    private $list;

    public function __construct(UserDTO $filter, UserRepositoryInterface $repository)
    {
        $this->list = $repository->findAll($filter);
    }

    public function getList()
    {
        return $this->list;
    }
}