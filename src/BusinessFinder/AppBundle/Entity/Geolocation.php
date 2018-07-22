<?php

namespace BusinessFinder\AppBundle\Entity;

class Geolocation
{
    /** @var float */
    private $latitude;

    /** @var float */
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