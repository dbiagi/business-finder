<?php

namespace BusinessFinder\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * BusinessRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BusinessRepository extends EntityRepository
{
    public function findByCriteria($criteria)
    {
        $qb = $this->createQueryBuilder('b')
            ->select('b, categories')
            ->join('b.categories', 'categories')
            ->orderBy('b.title', 'ASC');

        $this->filter($qb, $criteria);

        return $qb;
    }

    private function filter(QueryBuilder $qb, $criteria)
    {
        if (!isset($criteria['terms']) && !$criteria['terms']) {
            return $qb;
        }

        $or = $qb->expr()->orX();
        $or->add($qb->expr()->like('b.title', ':like_terms'))
            ->add($qb->expr()->like('b.zipCode', ':like_terms'))
            ->add($qb->expr()->like('b.address', ':like_terms'))
            ->add($qb->expr()->like('b.city', ':like_terms'))
            ->add($qb->expr()->like('b.state', ':like_terms'))
            ->add($qb->expr()->like('b.phone', ':like_terms'))
            ->add($qb->expr()->like('categories.name', ':like_terms'));

        $qb->andWhere($or)
            ->setParameter('like_terms', sprintf('%%%s%%', $criteria['terms']));

        return $qb;
    }
}
