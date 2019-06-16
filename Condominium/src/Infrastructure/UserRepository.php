<?php

namespace cs313\Condominium\Infrastructure;


use cs313\condominium\Model\User\UserDTO;
use cs313\Condominium\Model\User\UserDTOBuilder;
use cs313\Condominium\Model\User\UserRepositoryInterface;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function findOne(UserDTO $filter): ?UserDTO
    {
        $sql = '
            select * from condominium.user u
            join condominium.person p on p.id = u.id_person
            where u.id is not null
            ';

        if ($filter->getLogin()) {
            $sql .= 'and lower(u.ds_login) = lower(\''.$filter->getLogin().'\')';
        }

        if ($filter->getPassword()) {
            $sql .= ' and u.ds_password = \''.$filter->getPassword().'\'';
        }

        if ($filter->getPerson()->getFullName()) {
            $sql .= 'and lower(p.ds_fullname) like lower(\'%'.$filter->getPerson()->getFullName().'%\')';
        }

        if ($filter->getPerson()->getEmail()) {
            $sql .= 'and lower(p.ds_email) like lower(\'%'.$filter->getPerson()->getEmail().'%\')';
        }
var_dump($sql); exit;
        $statement = $this->executeStatement($sql);
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        if ($row) {
            $builder = new UserDTOBuilder();
            $result = $builder->buildFromEntity($row);
        }

        return $result;
    }
}
