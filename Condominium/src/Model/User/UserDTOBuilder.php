<?php
namespace cs313\Condomimium\Model\User;

use cs313\Condominium\Model\User\PersonDTO;

final class UserDTOBuilder
{
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
            $userid ?? null,
            $userlogin ?? null,
            $password ?? null,
            $person ,
            $now
        );
    }

    public function buildFromEntity(User $user)
    {
        $person = $user->getPerson();
        $person = new PersonDTO(
            $person->getId(),
            $person->getName(),
            $person->getEmail(),
            $person->getPhone(),
            $person->getGender(),
            $person->getBirthday(),
            $person->getCreated()
        );

        return new UserDto(
            $user->getId(),
            $user->getLogin(),
            $user->getPassword(),
            $person,
            $user->getCreation()
        );
    }
}