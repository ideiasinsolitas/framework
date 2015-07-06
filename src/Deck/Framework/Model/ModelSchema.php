<?php

namespace Deck\Framework\Model;

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
abstract class ModelSchema
{

    /**
     * @var
     */
    protected $fields;

    /**
     * @var
     */
    protected $relationships;


    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function __construct($fields, $relationships)
    {

        $this->fields = $fields;
        $this->relationships = $relationships;
    }


    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function getFields()
    {
        return $this->fields;
    }


    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function getRelationships()
    {
        return $this->relationships;
    }


    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function getProperties()
    {
        return array_merge($this->fields, $this->relationships);
    }
}
