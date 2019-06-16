<?php

namespace cs313\Condominium\Model\User;

final class UserDTOBuilder
{
    public function buildEmpty()
    {
        $person = new PersonDTO();
        $user = new UserDTO();
        $user->setPerson($person);

        return $user;
    }

    public function buildFromArray(array $params): UserDTO
    {
        extract($params, EXTR_SKIP);
        $birthday = isset($birthday) ? date_create_from_format('Y-m-d', $birthday) : null;
        $now = new \DateTime();

        $person = new PersonDTO(
            $personid ?? null,
            $fullname ?? null,
            $email ?? null,
            $phone ?? null,
            $gender ?? null,
            $birthday ?? null,
            $now
        );

        return new UserDTO(
            $id ?? null,
            $userlogin ?? null,
            $password ?? null,
            $person,
            $now
        );
    }

    public function buildFromEntity(array $row)
    {
        $person = new PersonDTO(
            $row['personid'],
            $row['name'],
            $row['email'],
            $row['phone'],
            $row['gender']
        );

        return new UserDto(
            $row['userid'],
            $row['login'],
            $row['password'],
            $person
        );
    }
}
