<?php


namespace cs313\Condominium\Model\User;

use cs313\Condomimium\Model\User\UserDTO;

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