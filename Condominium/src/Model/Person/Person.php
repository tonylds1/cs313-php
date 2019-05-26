<?php
namespace cs313\Condominium\Model\Pessoa;

final class Person
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
        $id,
        $fullName,
        $email,
        $phone,
        $gender,
        \DateTime $birth,
        \DateTime $created
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
     * @return datetime
     */
    public function getBirth(): datetime
    {
        return $this->birth;
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }
}