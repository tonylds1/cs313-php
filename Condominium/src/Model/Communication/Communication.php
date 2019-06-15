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
    public function __construct(int $id, User $userOrigin, User $userDestiny, string $text, \DateTime $creation, int $daysAvailable)
    {
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
}