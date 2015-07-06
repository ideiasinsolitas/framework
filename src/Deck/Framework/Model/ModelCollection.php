<?php

namespace Deck\Framework\Model;

use Deck\Framework\ObjectCollection;

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
class ModelCollection extends ObjectCollection
{

    /**
     * Return objects as arrays
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function asArray()
    {

        $array = array();

        foreach ($this->objects as $object) {
            $array[] = $object->asArray();
        }

        return $array;
    }

    /**
     * Return objects as arrays
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function asObject()
    {

        $array = array();

        foreach ($this->objects as $object) {
            $array[] = $object->asObject();
        }

        return $array;
    }

    /**
     * Return objects as arrays
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function add(ModelInterface $model)
    {

        $id = $model->getId();

        parent::add($id, $model);
    }

    /**
     * Return objects as arrays
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function remove($id)
    {

        parent::remove($id);
    }

    /**
     * Return objects as arrays
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function get($id)
    {

        return parent::get($id);
    }
}
