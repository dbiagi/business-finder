<?php

namespace Tests\AppBundle\Annotation;

use AppBundle\Annotation\Document;
use AppBundle\Entity\Business;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DocumentAnnotationTest extends KernelTestCase
{
    /** @var ContainerInterface */
    private $container;

    public function setUp()
    {
        self::bootKernel();

        $this->container = self::$kernel->getContainer();
    }

    public function testDocumentAnnotation()
    {
        $reader = new AnnotationReader();
        $business = new Business();

        $annotation = $reader->getClassAnnotation(new \ReflectionClass($business), Document::class);

        $this->assertInstanceOf(Document::class, $annotation);

        $this->assertNotNull($annotation->type, 'Annotation type should not be null');
    }

}