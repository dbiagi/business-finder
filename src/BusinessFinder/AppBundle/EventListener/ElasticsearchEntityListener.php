<?php

namespace BusinessFinder\AppBundle\EventListener;

use BusinessFinder\AppBundle\Annotation\Document;
use BusinessFinder\AppBundle\Elastica\ObjectPersisterFactory;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;

class ElasticsearchEntityListener implements EventSubscriber
{
    /** @var ObjectPersisterFactory */
    private $objectPersisterFactory;

    function __construct(ObjectPersisterFactory $objectPersisterFactory)
    {
        $this->objectPersisterFactory = $objectPersisterFactory;
    }

    public function getSubscribedEvents()
    {
        return [
            'postPersist',
            'postUpdate',
        ];
    }

    public function postPersist(LifecycleEventArgs $eventArgs)
    {
        $obj = $eventArgs->getObject();
        $reader = new AnnotationReader();

        $annotation = $reader->getClassAnnotation(new \ReflectionClass($obj), Document::class);

        if (!$annotation instanceof Document) {
            return;
        }

        $persister = $this->objectPersisterFactory->createObjectPersister($annotation->type);

        $persister->insertOne($obj);
    }

    public function postUpdate(LifecycleEventArgs $eventArgs)
    {
        $obj = $eventArgs->getObject();
        $reader = new AnnotationReader();

        $annotation = $reader->getClassAnnotation(new \ReflectionClass($obj), Document::class);

        if (!$annotation instanceof Document) {
            return;
        }

        $persister = $this->objectPersisterFactory->createObjectPersister($annotation->type);

        $persister->replaceOne($obj);
    }
}