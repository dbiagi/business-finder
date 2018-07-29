<?php declare(strict_types=1);

namespace BusinessFinder\DealBundle\Entity;

use BusinessFinder\AppBundle\Entity\Category;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Deal
 *
 * @ORM\Table(name="deal")
 * @ORM\Entity(repositoryClass="BusinessFinder\DealBundle\Repository\DealRepository")
 */
class Deal
{
    public const DISCOUNT_VALUE = 'value';

    public const DISCOUNT_PERCENT = 'percent';

    public const DISCOUNT_CUSTOM_VALUE = 'custom';

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
     * @var float
     *
     * @ORM\Column(name="discount", type="float", nullable=true)
     */
    private $discount;

    /**
     * @var string
     *
     * @ORM\Column(name="discountType", type="string", length=40)
     */
    private $discountType;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="BusinessFinder\AppBundle\Entity\Category")
     * @ORM\JoinTable(name="deal_x_category")
     * @Assert\Count(min="1")
     */
    private $category;

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
     * @return Deal
     */
    public function setTitle($title): Deal
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
     * @return Deal
     */
    public function setDescription($description): Deal
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get discount
     *
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * Set discount
     *
     * @param float $discount
     *
     * @return Deal
     */
    public function setDiscount($discount): Deal
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discountType
     *
     * @return string
     */
    public function getDiscountType(): string
    {
        return $this->discountType;
    }

    /**
     * Set discountType
     *
     * @param string $discountType
     *
     * @return Deal
     */
    public function setDiscountType($discountType): Deal
    {
        $this->discountType = $discountType;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Deal
     */
    public function setPrice($price): Deal
    {
        $this->price = $price;

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
     * @param ArrayCollection $category
     * @return Deal
     */
    public function setCategory(ArrayCollection $category): Deal
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Adds a category
     *
     * @param Category $category
     * @return $this
     */
    public function addCategory(Category $category): Deal
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
        }

        return $this;
    }
}

