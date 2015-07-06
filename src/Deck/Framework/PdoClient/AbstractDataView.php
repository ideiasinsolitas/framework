<?php

namespace Deck\Framework\SqlRepository;

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
abstract class AbstractDataView
{

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function __construct(array $repositories = null)
    {

        $this->repositories = new RepositoryCollection();

        if ($repositories) {
            $this->repositories->map($repositories);
        }
    }


    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function addRepository($name, $repository)
    {

        $this->repositories->add($name, $repository);
    }


    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    abstract public function initialize();

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    abstract public function load();
}


class ContentDataView extends AbstractDataView
{

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function load()
    {
        
    }
}

class MediaDataView extends AbstractDataView
{


    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function load()
    {
        
    }
}

class SystemDataView extends AbstractDataView
{


    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function load()
    {
        
    }
}
