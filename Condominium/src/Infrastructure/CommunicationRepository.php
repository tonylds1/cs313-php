<?php

namespace cs313\Condominium\Infrastructure;

use cs313\Condomimium\Model\User\UserDTOBuilder;
use cs313\Condominium\Model\Communication\CommunicationDTO;
use cs313\Condominium\Model\Communication\CommunicationDTOBuilder;
use cs313\Condominium\Model\Communication\CommunicationRepositoryInterface;

class CommunicationRepository extends Repository implements CommunicationRepositoryInterface
{
    /**
     * @param CommunicationDTO $filter
     * @return array
     */
    public function findAll(CommunicationDTO $filter): array
    {
        $sql = '
            SELECT c.id as id,
            c.id_user_origin as useroriginid,
            c.id_user_destity as userdestinyid,
            c.ds_title as title,
            c.ds_text as text,
            c.dt_creation as created,
            c.nu_days as days,
            porigin.ds_fullname as from
            pdestiny.ds_fullname as to
            FROM condominium.communication c 
            JOIN condominium.user uorigin on u.id = c.id_user_origin
            JOIN condominium.user udestiny on u.id = c.id_user_destiny
            JOIN condominium.person porigin on porigin.id = uorigin.id_person
            JOIN condominium.person pdestiny on pdestiny.id = udestiny.id_person 
            WHERE c,id is not null
            ';

        if ($filter->getId()) {
            $sql .= ' and id = ' . $filter->getId();
        }

        if ($filter->getUserOrigin()) {
            $sql .= ' and id_user_origin = ' . $filter->getUserOrigin();
        }

        if ($filter->getUserDestiny()) {
            $sql .= ' and id_user_destiny = ' . $filter->getUserDestiny();
        }

        if ($filter->get()) {
            $sql .= ' and id_user_destiny = ' . $filter->getUserDestiny();
        }
        $statement = $this->executeStatement($sql);

        $result = [];
        $builder = new CommunicationDTOBuilder(new UserDTOBuilder());

        while ($row = $statement->fetch(\PDO::FETCH_ASSOC))
        {
            $result[] = $builder->buildFromArray($row);
        }

        return $result;
    }

    /**
     * @return array
     */
    public function findBroadCast(): array
    {
        $sql = '
            SELECT c.id as id,
            c.id_user_origin as useroriginid,
            c.id_user_destity as userdestinyid,
            c.ds_title as title,
            c.ds_text as text,
            c.dt_creation as created,
            c.nu_days as days,
            porigin.ds_fullname as from
            pdestiny.ds_fullname as to
            FROM condominium.communication c 
            JOIN condominium.user uorigin on u.id = c.id_user_origin
            JOIN condominium.user udestiny on u.id = c.id_user_destiny
            JOIN condominium.person porigin on porigin.id = uorigin.id_person
            JOIN condominium.person pdestiny on pdestiny.id = udestiny.id_person 
            WHERE c.id_user_destinu is null
            ';

        $statement = $this->executeStatement($sql);

        $result = [];

        $builder = new CommunicationDTOBuilder(new UserDTOBuilder());

        while ($row = $statement->fetch(\PDO::FETCH_ASSOC))
        {
            $result[] = $builder->buildFromArray($row);
        }

        return $result;
    }

    /**
     * @param CommunicationDTO $filter
     * @return Communication|null
     */
    public function findOne(CommunicationDTO $filter): ?Communication
    {
        return current($this->findAll($filter));
    }

    /**
     * @param int $id
     * @return Communication|null
     */
    public function findById(int $id): ?Communication
    {
        $sql = 'SELECT * FROM condominium.shared_area where id = '. $id;
        $statement = $this->executeStatement($sql);
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        if ($row) {
            return new Communication($row['id'], $row['ds_name']);
        }

        return null;
    }

    public function delete(int $id)
    {
        $sql = 'Delete from condominium.shared_area where id = '. $id;
        $this->executeStatement($sql);
    }

    public function update(CommunicationDTO $communicationDTO)
    {
        if (!$communicationDTO->getName()) {
            return;
        }

        $sql = 'UPDATE condominium.shared_area '.
            'SET ds_name = \''. $communicationDTO->getName(). '\' '.
            'WHERE id = '. $communicationDTO->getId()
        ;
        
        $this->executeStatement($sql);
    }

    public function insert(CommunicationDTO $communicationDTO)
    {
        if (!$communicationDTO->getName()) {
            return;
        }

        $sql = 'INSERT INTO condominium.shared_area '.
            '(ds_name) VALUES (\''.$communicationDTO->getName().'\')';

        $this->executeStatement($sql);
    }
}
