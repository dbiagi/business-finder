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
    public const GLOBAL_SEARCH = 'search.global';

    /**
     * Fired on listing search
     */
    public const LISTING_SEARCH = 'search.listing';

    /**
     * Fired on event search
     */
    public const EVENT_SEARCH = 'search.event';

    /**
     * Fired on deal search
     */
    public const DEAL_SEARCH = 'search.deal';
}