<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="points_received")
 */
class PointsReceived extends TimeStampTable
{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\Column(type="integer")
     */
    protected $points;
	
	/**
     * @ORM\Column(type="integer")
     */
    protected $user_id_from;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set points
     *
     * @param integer $points
     *
     * @return PointsReceived
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set userIdFrom
     *
     * @param integer $userIdFrom
     *
     * @return PointsReceived
     */
    public function setUserIdFrom($userIdFrom)
    {
        $this->user_id_from = $userIdFrom;

        return $this;
    }

    /**
     * Get userIdFrom
     *
     * @return integer
     */
    public function getUserIdFrom()
    {
        return $this->user_id_from;
    }
}
