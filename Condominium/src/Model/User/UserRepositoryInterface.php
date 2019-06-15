<?php

namespace cs313\Condominium\Model\User;

use cs313\Condomimium\Model\User\User;
use cs313\Condomimium\Model\User\UserDTO;

interface UserRepositoryInterface
{
    public function findAll(UserDTO $filter): array;
    public function findOne(UserDTO $filter): ?User;
    public function findById(int $id): ?User;
    public function update(UserDTO $userDto);
    public function delete(int $id);
}