<?php

namespace BusinessFinder\BlockBundle\Exception;

use BusinessFinder\BlockBundle\Block\BlockInterface;

class BlockNotFoundException extends \Exception
{
    /**
     * BlockNotFoundException constructor.
     *
     * @param string $name Block name
     */
    public function __construct($name)
    {
        $message = sprintf(
            'Block "%s" not found. Did you implement "%s", registered the block as a service and added the tag "block"?',
            $name,
            BlockInterface::class
        );

        parent::__construct($message);
    }
}