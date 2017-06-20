<?php

namespace AppBundle\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * Class Document
 * @package AppBundle\Annotation
 *
 * @Annotation
 * @Annotation\Target("CLASS")
 */
class Document
{
    /** @var string */
    public $type;
}