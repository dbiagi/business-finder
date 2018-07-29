<?php declare(strict_types=1);

namespace BusinessFinder\AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class EntityEventArgs extends Event
{
    /** @var string */
    private $entityClass;

    /** @var string */
    private $formTypeClass;

    /** @var string */
    private $template;

    /** @var string */
    private $sucessFlashMessage;

    /** @var string */
    private $errorFlashMessage;

    /**
     * Get class
     *
     * @return mixed
     */
    public function getEntityClass()
    {
        return $this->entityClass;
    }

    /**
     * Set the FQCN of entity
     *
     * @param mixed $entityClass
     * @return EntityEventArgs
     */
    public function setEntityClass($entityClass): EntityEventArgs
    {
        $this->entityClass = $entityClass;

        return $this;
    }

    /**
     * Get formTypeClass
     *
     * @return string
     */
    public function getFormTypeClass(): string
    {
        return $this->formTypeClass;
    }

    /**
     * Set FQCN of form type class
     *
     * @param string $formTypeClass
     * @return EntityEventArgs
     */
    public function setFormTypeClass(string $formTypeClass): EntityEventArgs
    {
        $this->formTypeClass = $formTypeClass;

        return $this;
    }

    /**
     * Get the custom form template
     *
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * Set the custom form template
     *
     * @param string $template
     * @return EntityEventArgs
     */
    public function setTemplate(string $template): EntityEventArgs
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get sucessFlashMessage
     *
     * @return string
     */
    public function getSucessFlashMessage(): string
    {
        return $this->sucessFlashMessage;
    }

    /**
     * Set sucessFlashMessage
     *
     * @param string $sucessFlashMessage
     * @return EntityEventArgs
     */
    public function setSucessFlashMessage(string $sucessFlashMessage): EntityEventArgs
    {
        $this->sucessFlashMessage = $sucessFlashMessage;

        return $this;
    }

    /**
     * Get errorFlashMessage
     *
     * @return string
     */
    public function getErrorFlashMessage(): string
    {
        return $this->errorFlashMessage;
    }

    /**
     * Set errorFlashMessage
     *
     * @param string $errorFlashMessage
     * @return EntityEventArgs
     */
    public function setErrorFlashMessage(string $errorFlashMessage): EntityEventArgs
    {
        $this->errorFlashMessage = $errorFlashMessage;

        return $this;
    }

}