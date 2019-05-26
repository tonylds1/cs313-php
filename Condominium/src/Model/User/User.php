<?php
namespace cs313\Condomimium\Model\User;

use cs313\Condominium\Model\Pessoa\Person;

final class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @var Person
     */
    private $person;

    /**
     * @var Datetime
     */
    private $creation;

    /**
     * User constructor.
     * @param int $id
     * @param string $login
     * @param string $password
     * @param Person $person
     * @param Datetime $creation
     */
    public function __construct(int $id, string $login, string $password, Person $person, Datetime $creation)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->person = $person;
        $this->creation = $creation;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return Person
     */
    public function getPerson(): Person
    {
        return $this->person;
    }

    /**
     * @return Datetime
     */
    public function getCreation(): Datetime
    {
        return $this->creation;
    }
}