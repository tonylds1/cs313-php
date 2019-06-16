<?php

namespace cs313\Condominium\Model\User;

interface UserRepositoryInterface
{
    public function findOne(UserDTO $filter): ?UserDTO;
}