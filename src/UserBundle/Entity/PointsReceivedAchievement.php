<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="points_received_achievement")
 */
class PointsReceivedAchievement extends TimeStampTable
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
     * @ORM\Column(type="integer")
     */
    protected $points;
	
	/**
     * @ORM\Column(type="integer")
     */
    protected $achievement_id;
	
	/**
     * @ORM\Column(type="text")
     */
    protected $message;

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
     * @return PointsReceivedAchievements
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
     * Set points
     *
     * @param integer $points
     *
     * @return PointsReceivedAchievements
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
     * Set achievementId
     *
     * @param integer $achievementId
     *
     * @return PointsReceivedAchievements
     */
    public function setAchievementId($achievementId)
    {
        $this->achievement_id = $achievementId;

        return $this;
    }

    /**
     * Get achievementId
     *
     * @return integer
     */
    public function getAchievementId()
    {
        return $this->achievement_id;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return PointsReceivedAchievement
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
