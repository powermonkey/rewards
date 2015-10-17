<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="points_log")
 */
class PointsLog extends TimeStampTable
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
    protected $user_id;
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    protected $points_type;
	
	/**
     * @ORM\Column(type="integer")
     */
    protected $points_type_id;

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
     * Set userId
     *
     * @param integer $userId
     *
     * @return PointsLog
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set pointsType
     *
     * @param string $pointsType
     *
     * @return PointsLog
     */
    public function setPointsType($pointsType)
    {
        $this->points_type = $pointsType;

        return $this;
    }

    /**
     * Get pointsType
     *
     * @return string
     */
    public function getPointsType()
    {
        return $this->points_type;
    }

    /**
     * Set pointsTypeId
     *
     * @param integer $pointsTypeId
     *
     * @return PointsLog
     */
    public function setPointsTypeId($pointsTypeId)
    {
        $this->points_type_id = $pointsTypeId;

        return $this;
    }

    /**
     * Get pointsTypeId
     *
     * @return integer
     */
    public function getPointsTypeId()
    {
        return $this->points_type_id;
    }
}
