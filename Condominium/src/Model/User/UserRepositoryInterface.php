<?php

namespace cs313\Condominium\Model\User;

interface UserRepositoryInterface
{
    public function findAll(UserDTO $filter): array;
    public function findOne(UserDTO $filter): ?User;
    public function findById(int $id): ?User;
    public function update(UserDTO $userDto);
    public function delete(int $id);
}