<?php

namespace BusinessFinder\SearchBundle\Event;

/**
 * Class SearchEvents
 */
class SearchEvents
{
    /**
     * Fired when no module is specified on search.
     */
    const GLOBAL_SEARCH = 'search.global';

    /**
     * Fired on listing search
     */
    const LISTING_SEARCH = 'search.listing';

    /**
     * Fired on event search
     */
    const EVENT_SEARCH = 'search.event';

    /**
     * Fired on deal search
     */
    const DEAL_SEARCH = 'search.deal';
}