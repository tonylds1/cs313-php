<?php

namespace cs313\Condominium\Model\SharedArea;

interface SharedAreaRepositoryInterface
{
    public function findAll(SharedAreaDTO $filter): SharedAreaList;
    public function findOne(SharedAreaDTO $filter): SharedArea;
    public function findById(int $id): SharedArea;
}