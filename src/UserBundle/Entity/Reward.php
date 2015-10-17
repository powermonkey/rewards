<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="reward")
 */
class Reward extends TimeStampTable
{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    protected $rewards_name;
	
	/**
     * @ORM\Column(type="integer")
     */
    protected $points_required;

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
     * Set rewardsName
     *
     * @param string $rewardsName
     *
     * @return Reward
     */
    public function setRewardsName($rewardsName)
    {
        $this->rewards_name = $rewardsName;

        return $this;
    }

    /**
     * Get rewardsName
     *
     * @return string
     */
    public function getRewardsName()
    {
        return $this->rewards_name;
    }

    /**
     * Set pointsRequired
     *
     * @param integer $pointsRequired
     *
     * @return Reward
     */
    public function setPointsRequired($pointsRequired)
    {
        $this->points_required = $pointsRequired;

        return $this;
    }

    /**
     * Get pointsRequired
     *
     * @return integer
     */
    public function getPointsRequired()
    {
        return $this->points_required;
    }
}
