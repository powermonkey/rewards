<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass()
 * @ORM\HasLifecycleCallbacks()
 */
abstract class TimeStampTable
{
    /** 
	 * @var \DateTime
	 * @ORM\Column(type="datetime") 
	 */
    protected $date_created;
	
    /** 
	 * @var \DateTime
	 * @ORM\Column(type="datetime") 
	 */
    protected $date_modified;
	
	/**
     * @param \DateTime $date_created
     */
    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param \DateTime $date_modified
     */
    public function setDateModified($date_modified)
    {
        $this->date_modified = $date_modified;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->date_modified;
    }
	
	/**
     * @ORM\PreUpdate()
     */
    public function setDateModifiedValue()
    {
       $this->setDateModified(new \DateTime("now"));
    }

    /**
     * @ORM\PrePersist()
     */
    public function setDateCreatedValue()
    {
        $this->setDateCreated(new \DateTime("now"));
        $this->setDateModified(new \DateTime("now"));
    }
}
