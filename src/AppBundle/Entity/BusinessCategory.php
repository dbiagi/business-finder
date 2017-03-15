<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * BusinessCategory
 *
 * @ORM\Table(name="business_category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BusinessCategoryRepository")
 */
class BusinessCategory {

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Business", mappedBy="categories")
     */
    private $businesses;

    function __construct() {
        $this->businesses = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return BusinessCategory
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return BusinessCategory
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get businesses
     *
     * @return ArrayCollection
     */
    public function getBusinesses() {
        return $this->businesses;
    }
}

