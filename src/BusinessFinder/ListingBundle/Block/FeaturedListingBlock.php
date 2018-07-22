<?php

namespace BusinessFinder\ListingBundle\Block;

use BusinessFinder\BlockBundle\Block\BaseBlock;
use BusinessFinder\ListingBundle\Entity\Listing;
use BusinessFinder\ListingBundle\Repository\ListingRepository;
use Doctrine\ORM\EntityManagerInterface;
use function React\Promise\resolve;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FeaturedListingBlock extends BaseBlock
{
    public const NAME = 'listing_featured';

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
    public static function getName(): string
    {
        return self::NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function render(): string
    {
        $options = $this->getOptions();

        $listings = $this->repository->findBy(['featured' => true], [], $options['count']);

        return $this->twig->render('@Listing/blocks/featured.html.twig', [
            'listings' => $listings,
        ]);
    }

    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'count' => 10
        ]);
    }
}