<?php
namespace cs313\Condominium\Model\User;

final class PersonDTO
{
    private $id;
    private $fullName;
    private $email;
    private $phone;

    /**
     * @var
     */
    private $gender;

    /**
     * @var datetime
     */
    private $birth;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * Person constructor.
     * @param $id
     * @param $fullName
     * @param $email
     * @param $phone
     * @param $gender
     * @param \DateTime $birth
     * @param \DateTime $created
     */
    public function __construct(
        $id = null,
        $fullName = null,
        $email = null,
        $phone = null,
        $gender = null,
        \DateTime $birth = null,
        \DateTime $created = null
    ) {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->phone = $phone;
        $this->gender = $gender;
        $this->birth = $birth;
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return DateTime
     */
    public function getBirth(): ?\DateTime
    {
        return $this->birth;
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): ?\DateTime
    {
        return $this->created;
    }

    /**
     * @param null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param null $fullName
     */
    public function setFullName($fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @param null $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @param null $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @param datetime $birth
     */
    public function setBirth(\DateTime $birth): void
    {
        $this->birth = $birth;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created): void
    {
        $this->created = $created;
    }
}