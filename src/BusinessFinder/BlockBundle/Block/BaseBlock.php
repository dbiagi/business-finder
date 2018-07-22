<?php

namespace BusinessFinder\BlockBundle\Block;

use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class BaseBlock implements BlockInterface
{
    /** @var \Twig_Environment */
    protected $twig;

    /** @var array */
    private $options;

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

    /**
     * {@inheritdoc}
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function setOptions($options): void
    {
        $resolver = new OptionsResolver();

        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    /**
     * Configure block options
     *
     * @param OptionsResolver $resolver
     */
    protected function configureOptions(OptionsResolver $resolver): void
    {
    }
}