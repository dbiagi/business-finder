<?php declare(strict_types=1);

namespace BusinessFinder\AppBundle\Repository;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;

abstract class BaseRepository
{
    /** @var ManagerRegistry */
    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    /**
     * Get ObjectManager
     *
     * @return EntityManager
     */
    protected function getManager(): EntityManager
    {
        return $this->managerRegistry->getManagerForClass(get_class($this));
    }
}