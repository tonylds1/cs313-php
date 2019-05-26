<?php


namespace cs313\Condominium\Model\SharedAreaSchedule;


use cs313\Condominium\Model\SharedArea\SharedArea;

class SharedAreaSchedule
{
    /**8
     * @var int
     */
    private $id;

    /**
     * @var SharedArea
     */
    private $sharedArea;

    /**
     * @var User
     */
    private $user;

    /**
     * @var \DateTime
     */
    private $dateBegin;

    /**
     * @var \DateTime
     */
    private $dateEnd;
}