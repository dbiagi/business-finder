<?php

namespace BusinessFinder\AppBundle\Map;

use Ivory\GoogleMap\Map;

class MapFactory
{
    /**
     * @return Map
     */
    public function createMap()
    {
        $map = new Map();

        return $map;
    }
}