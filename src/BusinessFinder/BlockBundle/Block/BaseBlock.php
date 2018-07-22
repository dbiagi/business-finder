<?php

namespace BusinessFinder\BlockBundle\Block;

abstract class BaseBlock implements BlockInterface
{
    /** @var \Twig_Environment */
    protected $twig;

    /**
     * Set twig
     *
     * @param \Twig_Environment $twig
     * @return BaseBlock
     * @required
     */
    public function setTwig(\Twig_Environment $twig): BaseBlock
    {
        $this->twig = $twig;

        return $this;
    }
}