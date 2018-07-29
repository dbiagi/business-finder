<?php declare(strict_types=1);

namespace BusinessFinder\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Geolocation
 *
 * @package BusinessFinder\AppBundle\Entity
 * @ORM\Embeddable()
 */
class Geolocation
{
    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $longitude;

    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return Geolocation
     */
    public function setLatitude($latitude): Geolocation
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return Geolocation
     */
    public function setLongitude($longitude): Geolocation
    {
        $this->longitude = $longitude;

        return $this;
    }
}