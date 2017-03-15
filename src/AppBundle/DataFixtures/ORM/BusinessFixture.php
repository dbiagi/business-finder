<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Business;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Definition of BusinessCategoryFixture
 *
 * @author Diego de Biagi <diegobiagiviana@gmail.com>
 */
class BusinessFixture extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    const COUNT = 20;

    /** @var ContainerInterface */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {
        $faker = $this->container->get('faker');

        $slugs = array_keys(BusinessCategoryFixture::CATEGORIES);


        for ($i = 0; $i < self::COUNT; $i++) {
            $b = new Business();
            $b->setTitle($faker->company)
                ->setAddress($faker->streetAddress)
                ->setCity($faker->city)
                ->setState($faker->stateAbbr)
                ->setDescription($faker->sentences(rand(10, 20), true))
                ->setPhone($faker->phoneNumber)
                ->setZipCode($faker->numerify('########'));

            $n = rand(1, 3);

            for ($j = 0; $j < $n; $j++) {
                $category = $this->getReference($slugs[rand(0, count($slugs) - 1)]);
                $b->addCategory($category);
            }

            $manager->persist($b);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder() {
        return 2;
    }

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }
}