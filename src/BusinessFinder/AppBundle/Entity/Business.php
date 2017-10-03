<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Business entity
 *
 * @ORM\Table(name="business")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BusinessRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Business
{

    use Datable;

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
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(min="3", max="255")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=30)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(min="9", max="16")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(min="3", max="255")
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="zipCode", type="string", length=8)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(min="8", max="8")
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(min="3", max="255")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=2)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(min="2", max="2")
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $description;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Category")
     * @ORM\JoinTable(name="business_x_category")
     * @Assert\Count(min="1")
     */
    private $categories;

    /**
     * @var Geolocation
     * @ORM\Column(type="geolocation", nullable=true)
     */
    private $location;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $featured = false;

    function __construct()
    {
        $this->categories = new ArrayCollection();
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
     * @return Business
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Business
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Business
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Business
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Business
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get uf
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set uf
     *
     * @param string $state
     *
     * @return Business
     */
    public function setState($state)
    {
        $this->state = $state;

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
     * @return Business
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param Category $category
     * @return Business
     */
    public function addCategory(Category $category)
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param ArrayCollection $categories
     * @return Business
     */
    public function setCategories($categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return Geolocation
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Geolocation $location
     * @return Business
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return bool
     */
    public function isFeatured(): bool
    {
        return $this->featured;
    }

    /**
     * @param bool $featured
     * @return Business
     */
    public function setFeatured(bool $featured)
    {
        $this->featured = $featured;

        return $this;
    }
}

