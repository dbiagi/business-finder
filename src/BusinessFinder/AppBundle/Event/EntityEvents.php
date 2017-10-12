<?php

namespace BusinessFinder\AppBundle\Event;

class EntityEvents
{
    /**
     * Fired when an form is needed to be build to persist a new module entity
     *
     * @see EntityEventArgs Event arg class
     */
    const NEW_ITEM = 'app.new.%s';

    /**
     * Fired when ana edit form is needed to be build to update the entity
     *
     * @see EntityEventArgs Event arg class
     */
    const EDIT_ITEM = 'app.edit.%s';
}