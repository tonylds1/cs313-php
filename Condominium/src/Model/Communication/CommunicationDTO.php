<?php

namespace cs313\Condominium\Model\Communication;

use cs313\Condomimium\Model\User\User;

class Communication
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var User
     */
    private $userOrigin;

    /**
     * @var User
     */
    private $userDestiny;

    /**
     * @var string
     */
    private $text;

    /**
     * @var \DateTime
     */
    private $creation;

    /**
     * @var int
     */
    private $daysAvailable;

    /**
     * Communication constructor.
     * @param int $id
     * @param User $userOrigin
     * @param User $userDestiny
     * @param string $text
     * @param \DateTime $creation
     * @param int $daysAvailable
     */
    public function __construct(
        int $id = null,
        User $userOrigin = null,
        User $userDestiny = null,
        string $text  = null,
        \DateTime $creation = null,
        int $daysAvailable
    ) {
        $this->id = $id;
        $this->userOrigin = $userOrigin;
        $this->userDestiny = $userDestiny;
        $this->text = $text;
        $this->creation = $creation;
        $this->daysAvailable = $daysAvailable;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUserOrigin(): User
    {
        return $this->userOrigin;
    }

    /**
     * @return User
     */
    public function getUserDestiny(): User
    {
        return $this->userDestiny;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return \DateTime
     */
    public function getCreation(): \DateTime
    {
        return $this->creation;
    }

    /**
     * @return int
     */
    public function getDaysAvailable(): int
    {
        return $this->daysAvailable;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param User $userOrigin
     */
    public function setUserOrigin(User $userOrigin): void
    {
        $this->userOrigin = $userOrigin;
    }

    /**
     * @param User $userDestiny
     */
    public function setUserDestiny(User $userDestiny): void
    {
        $this->userDestiny = $userDestiny;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @param \DateTime $creation
     */
    public function setCreation(\DateTime $creation): void
    {
        $this->creation = $creation;
    }

    /**
     * @param int $daysAvailable
     */
    public function setDaysAvailable(int $daysAvailable): void
    {
        $this->daysAvailable = $daysAvailable;
    }
}