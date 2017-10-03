<?php

namespace BusinessFinder\AppBundle\Elastica;

use Elastica\Aggregation\Terms;
use Elastica\Client;
use Elastica\Document;
use Elastica\Query;
use Elastica\Request;
use Elastica\Type\Mapping;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class Connection
 * @package AppBundle\Elastica
 * @deprecated This class is deprecated
 */
class Connection
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var Client */
    private $client;

    /** @var string */
    private $mappingFilepath;

    /** @var string */
    private $indexName;

    /** @var array */
    private $config;

    function __construct(SerializerInterface $serializer, $host, $port, $mappingFilepath, $indexName)
    {
        $this->client = new Client([
            'servers' => [
                ['host' => $host, 'port' => $port],
            ],
        ]);

        $this->serializer = $serializer;
        $this->mappingFilepath = $mappingFilepath;
        $this->indexName = $indexName;

        $this->config = $this->getConfig();
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function getConfig()
    {
        $json = json_decode(file_get_contents($this->mappingFilepath), JSON_OBJECT_AS_ARRAY);

        if (!$json && json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Error parsing config file.");
        }

        return $json;
    }

    /**
     * @throws \Exception
     */
    public function createIndex()
    {
        $index = $this->client->getIndex($this->indexName);

        $response = $index->create($this->config['settings'], true);

        if (!$response->isOk()) {
            throw new \Exception($response->getErrorMessage());
        }
    }

    public function createMapping()
    {
        $index = $this->client->getIndex($this->indexName);

        foreach ($this->config['mappings'] as $name => $mappingConfig) {
            $type = $index->getType($name);
            $mapping = new Mapping($type);
            $mapping->setProperties($mappingConfig['properties']);
            $mapping->send();
        }
    }

    public function addDocuments($typeName, $entities)
    {
        $type = $this->client->getIndex($this->indexName)->getType($typeName);

        foreach ($entities as $entity) {
            $fields = $this->serializer->serialize($entity, 'json', ['groups' => ['elastic']]);

            $document = new Document($entity->getId(), json_decode($fields, JSON_OBJECT_AS_ARRAY));

            $type->addDocument($document);
        }

        $response = $type->getIndex()->refresh();

        if(!$response->isOk()){
            throw new \Exception($response->getErrorMessage());
        }
    }

    public function addDocument($typeName, $entity)
    {
        $type = $this->client->getIndex($this->indexName)->getType($typeName);

        $fields = $this->serializer->serialize($entity, 'json', ['groups' => ['elastic']]);
        $document = new Document($entity->getId(), json_decode($fields, JSON_OBJECT_AS_ARRAY));

        $type->addDocument($document);

        $response = $type->getIndex()->refresh();

        if(!$response->isOk()){
            throw new \Exception($response->getErrorMessage());
        }
    }

    public function deleteDocument($typeName, $entity)
    {
        $type = $this->client->getIndex($this->indexName)->getType($typeName);

        $response = $type->deleteById($entity->getId());

        if(!$response->isOk()){
            throw new \Exception($response->getErrorMessage());
        }
    }

    public function query($type, $q)
    {
        $query['size'] = 1000;

        if ($q) {
            $query['query']['query_string'] = [
                'query' => $q,
            ];
        }

        $index = $this->client->getIndex($this->indexName);
        $path = sprintf('%s/%s/_search', $index->getName(), $type);

        $response = $this->client->request($path, Request::GET, [], $query);

        if (!$response->isOk()) {
            throw new \Exception($response->getErrorMessage());
        }

        $data = $response->getData();

        $result = [
            'total'     => $data['hits']['total'],
            'documents' => [],
        ];

        foreach ($data['hits']['hits'] as $doc) {
            $result['documents'][] = $doc['_source'];
        }

        return $result;

    }

    /**
     * @return array
     */
    public function getAggregations()
    {
        $terms = new Terms('business');
        $terms->setField('category')
         ->setSize('20');

        $query = Query::create([])
            ->addAggregation($terms);

        $index = $this->client->getIndex($this->indexName);

        return $index->search($query)->getAggregations();
    }
}