<?php

namespace cs313\Condominium\Model\Communication;

use cs313\Condomimium\Model\User\User;
use cs313\Condomimium\Model\User\UserDTO;
use cs313\Condominium\Model\User\PersonDTO;
use cs313\Condominium\Model\User\UserRepositoryInterface;

class CommunicationDTOBuilder
{
    private $userRepository;

    /**
     * CommunicationDTOBuilder constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @param array $params
     */
    public function buildFromArray(array $params)
    {
        extract($params, EXTR_SKIP);

        $userOrigin = $this->userRepository->findById($useroriginid);
        $userDestiny = $this->userRepository->findById($userdestinyid);

        return new CommunicationDTO(
            $userid ?? null,
            $userlogin ?? null,
            $password ?? null,
            $person ,
            $now
        );



    }
}
