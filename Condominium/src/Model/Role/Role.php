<?php


namespace cs313\Condominium\Model\Role;

/**
 * Class Role
 * @package cs313\Condominium\Model\Role
 */
class Role
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $level;

    /**
     * Role constructor.
     * @param int $id
     * @param string $name
     * @param int $level
     */
    public function __construct(int $id, string $name, int $level)
    {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }
}