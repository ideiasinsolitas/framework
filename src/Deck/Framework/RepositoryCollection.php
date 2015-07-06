<?php

namespace Deck\Framework\SqlRepository;

use Deck\Types\ObjectCollection;

/**
 * The short description
 *
 * As many lines of extendend description as you want {@link element}
 * links to an element
 * {@link http://www.example.com Example hyperlink inline link} links to
 * a website. The inline
 *
 * @package package name
 * @author  Pedro Koblitz
 */
class RepositoryCollection extends ObjectCollection
{

    /**
     * Return objects as arrays
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function map(array $repositories)
    {
        foreach ($repositories as $name => $repository) {
            $this->add($name, $repository);
        }
    }

    /**
     * Return objects as arrays
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function add($name, Repository $repository)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException("Error Processing Request");
        }

        parent::add($name, $repository);
    }
}
