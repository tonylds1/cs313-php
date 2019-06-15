<?php

namespace cs313\Condominium\Model\Communication;

use cs313\condominium\Model\User\UserDTO;

class CommunicationDTO
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var UserDTO
     */
    private $userOrigin;

    /**
     * @var UserDTO
     */
    private $userDestiny;

    /**
     * @var string
     */
    private $title;

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
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * CommunicationDTO constructor.
     * @param int|null $id
     * @param UserDTO|null $userOrigin
     * @param UserDTO|null $userDestiny
     * @param string|null $title
     * @param string|null $text
     * @param \DateTime|null $creation
     * @param int|null $daysAvailable
     * @param string|null $from
     * @param string|null $to
     */
    public function __construct(
        int $id = null,
        UserDTO $userOrigin = null,
        UserDTO $userDestiny = null,
        string $title  = null,
        string $text  = null,
        \DateTime $creation = null,
        int $daysAvailable = null,
        string $from = null,
        string $to = null
    ) {
        $this->id = $id;
        $this->userOrigin = $userOrigin;
        $this->userDestiny = $userDestiny;
        $this->title = $title;
        $this->text = $text;
        $this->creation = $creation;
        $this->daysAvailable = $daysAvailable;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return UserDTO
     */
    public function getUserOrigin(): ?UserDTO
    {
        return $this->userOrigin;
    }

    /**
     * @return UserDTO
     */
    public function getUserDestiny(): ?UserDTO
    {
        return $this->userDestiny;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return \DateTime
     */
    public function getCreation(): ?\DateTime
    {
        return $this->creation;
    }

    /**
     * @return int
     */
    public function getDaysAvailable(): ?int
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
    public function setUserOrigin(UserDto $userOrigin): void
    {
        $this->userOrigin = $userOrigin;
    }

    /**
     * @param User $userDestiny
     */
    public function setUserDestiny(UserDTO $userDestiny): void
    {
        $this->userDestiny = $userDestiny;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo(string $to): void
    {
        $this->to = $to;
    }
}