<?php

namespace AppBundle\Entity;

use AppBundle\Annotation\Document;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Event entity
 *
 * @Document(type="event")
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
     * @Groups({"elastic"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Groups({"elastic"})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     * @Groups({"elastic"})
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startAt", type="datetime")
     * @Groups({"elastic"})
     */
    private $startAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endAt", type="datetime", nullable=true)
     * @Groups({"elastic"})
     */
    private $endAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="recurrent", type="boolean")
     */
    private $recurrent;

    /**
     * @var Business
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Business")
     * @ORM\JoinColumn(fieldName="business_id", referencedColumnName="id", onDelete="cascade")
     * @Groups({"elastic"})
     */
    private $business;

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
     * @return Business
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * @param Business $business
     * @return Event
     */
    public function setBusiness($business)
    {
        $this->business = $business;

        return $this;
    }
}
