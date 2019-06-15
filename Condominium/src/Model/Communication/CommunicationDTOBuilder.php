<?php

namespace cs313\Condominium\Model\Communication;

use cs313\Condomimium\Model\User\User;
use cs313\Condomimium\Model\User\UserDTO;
use cs313\Condomimium\Model\User\UserDTOBuilder;
use cs313\Condominium\Model\User\PersonDTO;
use cs313\Condominium\Model\User\UserRepositoryInterface;

class CommunicationDTOBuilder
{
    private $userDtoBuilder;

    /**
     * CommunicationDTOBuilder constructor.
     * @param UserDTOBuilder $userRepository
     */
    public function __construct(UserDTOBuilder $userDtoBuilder)
    {
        $this->userDtoBuilder = $userDtoBuilder;
    }


    /**
     * @param array $params
     */
    public function buildFromArray(array $params)
    {
        extract($params, EXTR_SKIP);
        $now = new \DateTime();
        $userOrigin = $this->userDtoBuilder->buildFromArray(['id' => $useroriginid]);
        $userDestiny = $this->userDtoBuilder->buildFromArray(['id' => $userdestinyid]);

        return new CommunicationDTO(
            $id ?? null,
            $userOrigin,
            $userDestiny,
            $title ?? null,
            $text ?? null,
            $now,
            $days ?? null,
            $from ?? null,
            $to ?? null
        );
    }
}
