<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use UserBundle\Entity\TimeStampTable;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends TimeStampTable implements UserInterface
{
	const   ROLE_USER = 'ROLE_USER'; //default user role
	const	STATUS_ACTIVE = 1; //default status
	
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    protected $username;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    protected $firstname;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    protected $lastname;
	
	/**
     * @ORM\Column(type="string", length=130)
     */
	protected $password;
	
	/**
     * @ORM\Column(type="string", length=130)
     */
	protected $salt;
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    protected $email;
	
	/**
     * @ORM\Column(type="boolean")
     */
    protected $status;
	
	/**
     * @ORM\Column(type="simple_array", nullable=false)
	 * @var array
     */
	protected $role;
	
	/** 
	 * @var \DateTime
	 * @ORM\Column(type="datetime") 
	 */
    protected $date_hired;
	
	/**
     * @ORM\ManyToMany(targetEntity="Project")
     * @ORM\JoinTable(name="user_projects",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="project_id", referencedColumnName="id")}
     *      )
     **/
	protected $project;
	
	/**
     * @ORM\ManyToMany(targetEntity="PointsGiven")
     * @ORM\JoinTable(name="user_points_given",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="points_given_id", referencedColumnName="id")}
     *      )
     **/
	protected $points_given;
	
	/**
     * @ORM\ManyToMany(targetEntity="PointsReceived")
     * @ORM\JoinTable(name="user_points_received",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="points_received_id", referencedColumnName="id")}
     *      )
     **/
	protected $points_received;
	
	/**
     * @ORM\ManyToMany(targetEntity="PointsReceivedAchievement")
     * @ORM\JoinTable(name="user_points_received_achievement",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="points_received_achievement_id", referencedColumnName="id")}
     *      )
     **/
	protected $points_received_achievement;
	
	/**
     * @ORM\ManyToMany(targetEntity="Achievement")
     * @ORM\JoinTable(name="user_achievements",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="achievement_id", referencedColumnName="id")}
     *      )
     **/
	protected $achievement;
	
	/**
     * @ORM\ManyToMany(targetEntity="Reward")
     * @ORM\JoinTable(name="user_rewards",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="reward_id", referencedColumnName="id")}
     *      )
     **/
	protected $reward;
	
	/**
     * @ORM\ManyToMany(targetEntity="PointsReceivedPending")
     * @ORM\JoinTable(name="user_points_received_pending",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="points_received_pending_id", referencedColumnName="id")}
     *      )
     **/
	protected $points_received_pending;
	
	/**
     * @ORM\ManyToMany(targetEntity="Report")
     * @ORM\JoinTable(name="user_reports",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="report_id", referencedColumnName="id")}
     *      )
     **/
	protected $reports;
	
	/**
     * Constructor
     */
    public function __construct()
    {
		$this->addStatus(static::STATUS_ACTIVE); //add default status
		$this->setSalt(rand());
    }

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return User
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

    /**
     * Set role
     *
     * @param array $role
     *
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return array
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set dateHired
     *
     * @param \DateTime $dateHired
     *
     * @return User
     */
    public function setDateHired($dateHired)
    {
        $this->date_hired = $dateHired;

        return $this;
    }

    /**
     * Get dateHired
     *
     * @return \DateTime
     */
    public function getDateHired()
    {
        return $this->date_hired;
    }

    /**
     * Add project
     *
     * @param \UserBundle\Entity\Project $project
     *
     * @return User
     */
    public function addProject(\UserBundle\Entity\Project $project)
    {
        $this->project[] = $project;

        return $this;
    }

    /**
     * Remove project
     *
     * @param \UserBundle\Entity\Project $project
     */
    public function removeProject(\UserBundle\Entity\Project $project)
    {
        $this->project->removeElement($project);
    }

    /**
     * Get project
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add pointsGiven
     *
     * @param \UserBundle\Entity\PointsGiven $pointsGiven
     *
     * @return User
     */
    public function addPointsGiven(\UserBundle\Entity\PointsGiven $pointsGiven)
    {
        $this->points_given[] = $pointsGiven;

        return $this;
    }

    /**
     * Remove pointsGiven
     *
     * @param \UserBundle\Entity\PointsGiven $pointsGiven
     */
    public function removePointsGiven(\UserBundle\Entity\PointsGiven $pointsGiven)
    {
        $this->points_given->removeElement($pointsGiven);
    }

    /**
     * Get pointsGiven
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPointsGiven()
    {
        return $this->points_given;
    }

    /**
     * Add pointsReceived
     *
     * @param \UserBundle\Entity\PointsReceived $pointsReceived
     *
     * @return User
     */
    public function addPointsReceived(\UserBundle\Entity\PointsReceived $pointsReceived)
    {
        $this->points_received[] = $pointsReceived;

        return $this;
    }

    /**
     * Remove pointsReceived
     *
     * @param \UserBundle\Entity\PointsReceived $pointsReceived
     */
    public function removePointsReceived(\UserBundle\Entity\PointsReceived $pointsReceived)
    {
        $this->points_received->removeElement($pointsReceived);
    }

    /**
     * Get pointsReceived
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPointsReceived()
    {
        return $this->points_received;
    }

    /**
     * Add pointsReceivedAchievement
     *
     * @param \UserBundle\Entity\PointsReceivedAchievement $pointsReceivedAchievement
     *
     * @return User
     */
    public function addPointsReceivedAchievement(\UserBundle\Entity\PointsReceivedAchievement $pointsReceivedAchievement)
    {
        $this->points_received_achievement[] = $pointsReceivedAchievement;

        return $this;
    }

    /**
     * Remove pointsReceivedAchievement
     *
     * @param \UserBundle\Entity\PointsReceivedAchievement $pointsReceivedAchievement
     */
    public function removePointsReceivedAchievement(\UserBundle\Entity\PointsReceivedAchievement $pointsReceivedAchievement)
    {
        $this->points_received_achievement->removeElement($pointsReceivedAchievement);
    }

    /**
     * Get pointsReceivedAchievement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPointsReceivedAchievement()
    {
        return $this->points_received_achievement;
    }

    /**
     * Add achievement
     *
     * @param \UserBundle\Entity\Achievement $achievement
     *
     * @return User
     */
    public function addAchievement(\UserBundle\Entity\Achievement $achievement)
    {
        $this->achievement[] = $achievement;

        return $this;
    }

    /**
     * Remove achievement
     *
     * @param \UserBundle\Entity\Achievement $achievement
     */
    public function removeAchievement(\UserBundle\Entity\Achievement $achievement)
    {
        $this->achievement->removeElement($achievement);
    }

    /**
     * Get achievement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAchievement()
    {
        return $this->achievement;
    }

    /**
     * Add userReward
     *
     * @param \UserBundle\Entity\Reward $userReward
     *
     * @return User
     */
    public function addUserReward(\UserBundle\Entity\Reward $userReward)
    {
        $this->user_reward[] = $userReward;

        return $this;
    }

    /**
     * Remove userReward
     *
     * @param \UserBundle\Entity\Reward $userReward
     */
    public function removeUserReward(\UserBundle\Entity\Reward $userReward)
    {
        $this->user_reward->removeElement($userReward);
    }

    /**
     * Get userReward
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserReward()
    {
        return $this->user_reward;
    }
	
	/**
     * Add role
     *
     * @param array $role
     * @return User
     */
    public function addRole($role)
    {
        $this->role[] = $role;
        $this->role = array_unique($this->role);

        return $this;
    }
	
	/**
     * Add status
     *
     * @param boolean $status
     * @return User
     */
	public function addStatus($status)
	{
		$this->status = $status;
		
		return $this;
	}

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Add reward
     *
     * @param \UserBundle\Entity\Reward $reward
     *
     * @return User
     */
    public function addReward(\UserBundle\Entity\Reward $reward)
    {
        $this->reward[] = $reward;

        return $this;
    }

    /**
     * Remove reward
     *
     * @param \UserBundle\Entity\Reward $reward
     */
    public function removeReward(\UserBundle\Entity\Reward $reward)
    {
        $this->reward->removeElement($reward);
    }

    /**
     * Get reward
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * Add pointsReceivedPending
     *
     * @param \UserBundle\Entity\PointsReceivedPending $pointsReceivedPending
     *
     * @return User
     */
    public function addPointsReceivedPending(\UserBundle\Entity\PointsReceivedPending $pointsReceivedPending)
    {
        $this->points_received_pending[] = $pointsReceivedPending;

        return $this;
    }

    /**
     * Remove pointsReceivedPending
     *
     * @param \UserBundle\Entity\PointsReceivedPending $pointsReceivedPending
     */
    public function removePointsReceivedPending(\UserBundle\Entity\PointsReceivedPending $pointsReceivedPending)
    {
        $this->points_received_pending->removeElement($pointsReceivedPending);
    }

    /**
     * Get pointsReceivedPending
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPointsReceivedPending()
    {
        return $this->points_received_pending;
    }

    /**
     * Add report
     *
     * @param \UserBundle\Entity\Report $report
     *
     * @return User
     */
    public function addReport(\UserBundle\Entity\Report $report)
    {
        $this->reports[] = $report;

        return $this;
    }

    /**
     * Remove report
     *
     * @param \UserBundle\Entity\Report $report
     */
    public function removeReport(\UserBundle\Entity\Report $report)
    {
        $this->reports->removeElement($report);
    }

    /**
     * Get reports
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReports()
    {
        return $this->reports;
    }
	
	public function getRoles()
    {
		return $this->role;
    }

    public function eraseCredentials()
    {

    }

    public function equals(Users $user)
    {
        return $user->getUsername() == $this->getUsername();
    }
}
