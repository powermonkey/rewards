<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="points_received_pending")
 */
class PointsReceivedPending extends TimeStampTable
{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\Column(type="integer", length=50)
     */
    protected $user_id_from;
	
	/**
     * @ORM\Column(type="integer", length=50)
     */
    protected $user_id_to;
	
	/**
     * @ORM\Column(type="boolean")
     */
    protected $status;

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
     * Set userIdFrom
     *
     * @param integer $userIdFrom
     *
     * @return PointsReceivedPending
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

    /**
     * Set userIdTo
     *
     * @param integer $userIdTo
     *
     * @return PointsReceivedPending
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

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return PointsReceivedPending
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }
}
