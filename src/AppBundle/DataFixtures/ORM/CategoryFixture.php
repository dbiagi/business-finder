<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Definition of BusinessCategoryFixture
 *
 * @author Diego de Biagi <diegobiagiviana@gmail.com>
 */
class CategoryFixture extends AbstractFixture implements OrderedFixtureInterface
{

    const COUNT = 7;

    const CATEGORIES = [
        'auto'               => 'Auto',
        'beauty-and-fitness' => 'Beaty and Fitness',
        'entertainment'      => 'Entertainment',
        'food-and-dining'    => 'Food and Dining',
        'health'             => 'Health',
        'sports'             => 'Sports',
        'travel'             => 'Travel',
        'culture'            => 'Culture',

    ];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        foreach (self::CATEGORIES as $slug => $name) {
            $category = new Category();
            $category->setName($name)
                ->setSlug($slug);

            $manager->persist($category);

            $this->setReference($slug, $category);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}