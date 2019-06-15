<?php
namespace cs313\Condomimium\Model\User;

use cs313\Condominium\Model\User\PersonDTO;

final class UserDTO
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
     * @var PersonDTO
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
     * @param PersonDTO $person
     * @param \Datetime $creation
     */
    public function __construct(
        int $id = null,
        string $login = null,
        string $password = null,
        PersonDTO $person = null,
        \Datetime $creation = null
    ) {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->person = $person;
        $this->creation = $creation;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return Person
     */
    public function getPerson(): ?PersonDTO
    {
        return $this->person;
    }

    /**
     * @return Datetime
     */
    public function getCreation(): ?\Datetime
    {
        return $this->creation;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param PersonDTO $person
     */
    public function setPerson(PersonDTO $person): void
    {
        $this->person = $person;
    }

    /**
     * @param \Datetime $creation
     */
    public function setCreation(\Datetime $creation): void
    {
        $this->creation = $creation;
    }
}