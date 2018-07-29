<?php declare(strict_types=1);

namespace BusinessFinder\SearchBundle\Event;

abstract class AbstractSearchEventArgs
{
    /** @var array Modules on search */
    protected $modules = [];

    /** @var string Searched terms */
    protected $terms;

    /** @var string */
    protected $engine;

    /** @var array */
    protected $results;

    /**
     * Get search query
     *
     * @return mixed
     */
    abstract public function getQuery();

    /**
     * Get modules
     *
     * @return array
     */
    public function getModules(): array
    {
        return $this->modules;
    }

    /**
     * Set modules
     *
     * @param array $modules
     * @return AbstractSearchEventArgs
     */
    public function setModules(array $modules): AbstractSearchEventArgs
    {
        $this->modules = $modules;

        return $this;
    }

    /**
     * Get terms
     *
     * @return string
     */
    public function getTerms(): string
    {
        return $this->terms;
    }

    /**
     * Set terms
     *
     * @param string $terms
     * @return AbstractSearchEventArgs
     */
    public function setTerms(string $terms): AbstractSearchEventArgs
    {
        $this->terms = $terms;

        return $this;
    }

    /**
     * Get engine
     *
     * @return string
     */
    public function getEngine(): string
    {
        return $this->engine;
    }

    /**
     * Set engine
     *
     * @param string $engine
     * @return AbstractSearchEventArgs
     */
    public function setEngine(string $engine): AbstractSearchEventArgs
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get results
     *
     * @return array
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * Set results
     *
     * @param array $results
     * @return AbstractSearchEventArgs
     */
    public function setResults(array $results): AbstractSearchEventArgs
    {
        $this->results = $results;

        return $this;
    }

}