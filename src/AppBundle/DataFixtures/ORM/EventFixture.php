<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Event;
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
class EventFixture extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    const COUNT = 200;

    /** @var ContainerInterface */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = $this->container->get('faker');

        $buffer = 1;

        for($i = 0; $i < self::COUNT; $i++) {
            $event = new Event();
            $event->setDescription($faker->words(rand(10, 20), true))
                ->setTitle($faker->words(rand(1,7), true))
                ->setRecurrent(rand(0, 1) == 1)
                ->setStartAt(new \DateTime(sprintf('- %d days', rand(1, 100))))
                ->setEndAt(new \DateTime(sprintf('+ %d days', rand(1, 100))))
                ->setBusiness($this->getReference('business_' . rand(0,99)));

            $manager->persist($event);

            if($buffer % 100 == 0){
                $manager->flush();
            }
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
        return 3;
    }

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}