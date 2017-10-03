<?php

namespace BusinessFinder\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * BusinessCategory
 *
 * @ORM\Table(
 *     name="category",
 *     uniqueConstraints={@UniqueConstraint(name="unique_category", columns={"slug", "module"})}
 * )
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category {

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
     * @ORM\Column(type="string", length=255)
     * @Groups({"elastic"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $module;

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
     * @return Category
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
     * @return Category
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get module
     *
     * @return string
     */
    public function getModule(): string
    {
        return $this->module;
    }

    /**
     * Set module
     *
     * @param string $module
     * @return Category
     */
    public function setModule(string $module)
    {
        $this->module = $module;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}

