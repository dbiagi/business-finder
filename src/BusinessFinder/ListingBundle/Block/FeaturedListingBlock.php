<?php

namespace BusinessFinder\ListingBundle\Block;

use BusinessFinder\BlockBundle\Block\BaseBlock;
use BusinessFinder\ListingBundle\Entity\Listing;
use BusinessFinder\ListingBundle\Repository\ListingRepository;
use Doctrine\ORM\EntityManagerInterface;

class FeaturedListingBlock extends BaseBlock
{
    const NAME = 'listing_featured';

    /** @var ListingRepository */
    private $repository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repository = $em->getRepository(Listing::class);
    }

    /**
     * Get block name
     *
     * @return string
     */
    public static function getName()
    {
        return self::NAME;
    }

    /**
     * Render a piece of html
     *
     * @return string
     */
    public function render()
    {
        $listings = $this->repository->findBy(['featured' => true], [], 9);

        return $this->twig->render('@Listing/blocks/featured.html.twig', [
            'listings' => $listings,
        ]);
    }
}