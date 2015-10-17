<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="points_given")
 */
class PointsGiven extends TimeStampTable
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
    protected $user_id_to;

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
     * @return PointsGiven
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
     * Set userIdTo
     *
     * @param integer $userIdTo
     *
     * @return PointsGiven
     */
    public function setUserIdTo($userIdTo)
    {
        $this->user_id_to = $userIdTo;

        return $this;
    }

    /**
     * Get userIdTo
     *
     * @return integer
     */
    public function getUserIdTo()
    {
        return $this->user_id_to;
    }
}
