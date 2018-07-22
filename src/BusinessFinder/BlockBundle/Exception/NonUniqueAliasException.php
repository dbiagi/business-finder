<?php declare(strict_types=1);

namespace App\BusinessFinder\BlockBundle\Exception;

class NonUniqueAliasException extends \Exception
{
    public function __construct(string $alias)
    {
        $message = sprintf('The alias "%s" is already definined. It should be unique.', $alias);

        parent::__construct($message, 0, null);
    }
}