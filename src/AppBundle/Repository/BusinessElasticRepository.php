<?php

namespace AppBundle\Repository;


use AppBundle\Elastica\Connection;

class BusinessElasticRepository
{
    /** Elastic type */
    const TYPE = 'business';
    /** @var Connection */
    private $conn;
    /** @var BusinessRepository */
    private $repo;

    function __construct(Connection $conn, BusinessRepository $repo)
    {
        $this->conn = $conn;
        $this->repo = $repo;
    }

    public function findByCriteria($criteria)
    {
        $data = $this->conn->query(self::TYPE, $criteria['terms']);
        $entities = [];

        if ($data['total'] == 0) {
            return $entities;
        }

        foreach ($data['documents'] as $document) {
            $entity = $this->repo->find($document['id']);
            if ($entity) {
                $entities[] = $entity;
            }
        }

        return $entities;
    }
}