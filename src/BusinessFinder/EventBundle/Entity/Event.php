<?php declare(strict_types=1);

namespace BusinessFinder\EventBundle\Entity;

use BusinessFinder\AppBundle\Entity\Address;
use BusinessFinder\AppBundle\Entity\Category;
use BusinessFinder\AppBundle\Entity\DateTimeInfo;
use BusinessFinder\AppBundle\Entity\Geolocation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Event entity
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="BusinessFinder\EventBundle\Repository\EventRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Event
{
    use DateTimeInfo;

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
     *
     * @ORM\Embedded(class="BusinessFinder\AppBundle\Entity\Geolocation")
     */
    private $location;

    /**
     * @var Address
     * @ORM\Embedded(class="BusinessFinder\AppBundle\Entity\Address")
     */
    private $address;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): string
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
    public function setTitle($title): Event
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string
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
    public function setDescription($description): Event
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get startAt
     *
     * @return \DateTime
     */
    public function getStartAt(): \DateTime
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
    public function setStartAt($startAt): Event
    {
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * Get endAt
     *
     * @return \DateTime
     */
    public function getEndAt(): \DateTime
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
    public function setEndAt($endAt): Event
    {
        $this->endAt = $endAt;

        return $this;
    }

    /**
     * Get recurrent
     *
     * @return bool
     */
    public function isRecurrent(): bool
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
    public function setRecurrent($recurrent): Event
    {
        $this->recurrent = $recurrent;

        return $this;
    }

    /**
     * Get category
     *
     * @return ArrayCollection
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    /**
     * Set category
     *
     * @param Category $category
     * @return Event
     */
    public function setCategory(Category $category): Event
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
    public function setLocation(Geolocation $location): Event
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     *
     * @return Event
     */
    public function setAddress(Address $address): Event
    {
        $this->address = $address;

        return $this;
    }
}
