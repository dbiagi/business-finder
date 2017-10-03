<?php

namespace BusinessFinder\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Event entity
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 */
class Event
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startAt", type="datetime")
     */
    private $startAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endAt", type="datetime", nullable=true)
     */
    private $endAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="recurrent", type="boolean")
     */
    private $recurrent;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="BusinessFinder\AppBundle\Entity\Category")
     * @ORM\JoinTable(name="event_x_category")
     * @Assert\Count(min="1")
     */
    private $category;

    /**
     * @var Geolocation
     * @ORM\Column(type="geolocation", nullable=true)
     */
    private $location;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get startAt
     *
     * @return \DateTime
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Set startAt
     *
     * @param \DateTime $startAt
     *
     * @return Event
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * Get endAt
     *
     * @return \DateTime
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * Set endAt
     *
     * @param \DateTime $endAt
     *
     * @return Event
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;

        return $this;
    }

    /**
     * Get recurrent
     *
     * @return bool
     */
    public function isRecurrent()
    {
        return $this->recurrent;
    }

    /**
     * Set recurrent
     *
     * @param boolean $recurrent
     *
     * @return Event
     */
    public function setRecurrent($recurrent)
    {
        $this->recurrent = $recurrent;

        return $this;
    }

    /**
     * Get category
     *
     * @return ArrayCollection
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set category
     *
     * @param Category $category
     * @return Event
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Add a category
     *
     * @param Category $category
     * @return $this
     */
    public function addCategory(Category $category): Event
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
        }

        return $this;
    }

    /**
     * Get location
     *
     * @return Geolocation
     */
    public function getLocation(): Geolocation
    {
        return $this->location;
    }

    /**
     * Set location
     *
     * @param Geolocation $location
     * @return Event
     */
    public function setLocation(Geolocation $location)
    {
        $this->location = $location;

        return $this;
    }
}
