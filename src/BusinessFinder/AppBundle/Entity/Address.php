<?php declare(strict_types=1);

namespace BusinessFinder\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Address
 * @package BusinessFinder\AppBundle\Entity
 *
 * @ORM\Embeddable
 */
class Address
{
    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(min="3", max="255")
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=8, nullable=true)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(min="8", max="8")
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(min="3", max="255")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=2, nullable=true)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(min="2", max="2")
     */
    private $state;

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Address
     */
    public function setStreet(string $street): Address
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     * @return Address
     */
    public function setZipCode(string $zipCode): Address
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Address
     */
    public function setState(string $state): Address
    {
        $this->state = $state;

        return $this;
    }
}