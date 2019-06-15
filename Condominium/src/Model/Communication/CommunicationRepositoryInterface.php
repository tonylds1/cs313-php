<?php

namespace cs313\Condominium\Model\Communication;

interface CommunicationRepositoryInterface
{
    public function findAll(CommunicationDto $filter): array;
    public function findOne(CommunicationDto $filter): ?Communication;
    public function findById(int $id): ?Communication;
    public function update(CommunicationDto $communicationDto);
    public function delete(int $id);
}