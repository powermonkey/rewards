<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="achievement")
 */
class Achievement extends TimeStampTable
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
     * @ORM\OneToOne(targetEntity="Achievement")
     * @ORM\JoinColumn(name="achievement_id", referencedColumnName="id")
     **/
    protected $achievement_id;
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    protected $achievement_name;

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
     * @return Achievement
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
     * Set achievementName
     *
     * @param string $achievementName
     *
     * @return Achievement
     */
    public function setAchievementName($achievementName)
    {
        $this->achievement_name = $achievementName;

        return $this;
    }

    /**
     * Get achievementName
     *
     * @return string
     */
    public function getAchievementName()
    {
        return $this->achievement_name;
    }

    /**
     * Set achievementId
     *
     * @param \UserBundle\Entity\Achievement $achievementId
     *
     * @return Achievement
     */
    public function setAchievementId(\UserBundle\Entity\Achievement $achievementId = null)
    {
        $this->achievement_id = $achievementId;

        return $this;
    }

    /**
     * Get achievementId
     *
     * @return \UserBundle\Entity\Achievement
     */
    public function getAchievementId()
    {
        return $this->achievement_id;
    }
}
