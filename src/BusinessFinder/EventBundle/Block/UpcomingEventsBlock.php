<?php

namespace BusinessFinder\EventBundle\Block;

use BusinessFinder\BlockBundle\Block\BaseBlock;
use BusinessFinder\EventBundle\Entity\Event;
use BusinessFinder\EventBundle\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;

class UpcomingEventsBlock extends BaseBlock
{
    public const NAME = 'events_upcoming';

    /** @var EventRepository */
    private $repository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repository = $em->getRepository(Event::class);
    }

    /**
     * Get block name
     *
     * @return string
     */
    public static function getName(): string
    {
        return self::NAME;
    }

    /**
     * Render a piece of html
     *
     * @return string
     */
    public function render(): string
    {
        $query = $this->repository->findUpcomingEvents();

        return $this->twig->render('@Event/blocks/upcoming.html.twig', [
            'events' => $query->getResult(),
        ]);
    }
}