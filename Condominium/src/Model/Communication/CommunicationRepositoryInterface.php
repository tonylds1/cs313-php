<?php

namespace cs313\Condominium\Model\Communication;

interface CommunicationRepositoryInterface
{
    public function findAll(CommunicationDTO $filter): array;
    public function findOne(CommunicationDTO $filter): ?Communication;
    public function findById(int $id): ?Communication;
    public function update(CommunicationDTO $communicationDto);
    public function delete(int $id);
    public function findBroadCast();
}