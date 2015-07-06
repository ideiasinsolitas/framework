<?php

namespace Deck\Framework;

use Deck\Framework\DatabaseClientInterface;

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
abstract class Repository
{

    /**
     * @var
     */
    protected $client;

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function __construct(DatabaseClientInterface $client = null)
    {

        if ($client) {
            $this->setClient($client);
        }
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function setDatabaseClient(DatabaseClientInterface $client)
    {

        $this->client = $client;
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    abstract public function index($filters = array(), $pagination = array());

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    abstract public function create(ModelInterface $model);

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    abstract public function read($id);

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    abstract public function update(ModelInterface $model);

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    abstract public function delete($id);
}
