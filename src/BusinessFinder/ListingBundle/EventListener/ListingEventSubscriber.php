<?php

namespace BusinessFinder\ListingBundle\EventListener;

use BusinessFinder\AppBundle\Event\EntityEvents;
use BusinessFinder\AppBundle\Event\EntityEventArgs;
use BusinessFinder\ListingBundle\Entity\Listing;
use BusinessFinder\ListingBundle\Form\ListingType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Translation\Translator;

class ListingEventSubscriber implements EventSubscriberInterface
{
    /** @var Translator */
    private $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            sprintf(EntityEvents::NEW_ITEM, 'listing') => 'onNewListing',
            sprintf(EntityEvents::EDIT_ITEM, 'listing') => 'onEditListing',
        ];
    }

    /**
     * Configure listing form
     *
     * @param EntityEventArgs $args
     */
    public function onNewListing(EntityEventArgs $args)
    {
        $args->setEntityClass(Listing::class)
            ->setFormTypeClass(ListingType::class)
            ->setSucessFlashMessage($this->translator->trans('New listing added'))
            ->setErrorFlashMessage($this->translator->trans('Error adding a listing'))
        ;
    }

    /**
     * Configure edit form
     *
     * @param EntityEventArgs $args
     */
    public function onEditListing(EntityEventArgs $args)
    {
        $args->setEntityClass(Listing::class)
            ->setFormTypeClass(ListingType::class)
            ->setSucessFlashMessage($this->translator->trans('Listing sucefully updated'))
            ->setErrorFlashMessage($this->translator->trans('Error updating a listing'));
    }
}