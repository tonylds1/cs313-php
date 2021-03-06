<?php

namespace cs313\Condominium\Model\SharedArea;

interface SharedAreaRepositoryInterface
{
    public function findAll(SharedAreaDTO $filter): array;
    public function findOne(SharedAreaDTO $filter): ?SharedArea;
    public function findById(int $id): ?SharedArea;
    public function update(SharedAreaDTO $sharedAreaDTO);
    public function delete(int $id);
}