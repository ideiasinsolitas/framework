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
abstract class AbstractModel
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $activity;

    /**
     * @var
     */
    protected $status;

    /**
     * @var
     */
    protected $createdAt;

    /**
     * @var
     */
    protected $modifiedAt;

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function asObject($full = false)
    {

        if (!is_bool($full)) {
            throw new \InvalidArgumentException('$full must be boolean');
        }

        $object = new stdClass();

        foreach ($this->schema as $key => $value) {
            if (isset($this->$key)) {
                $methodName = 'get' . ucfirst($key);
                $val = $value->$methodName();

                if ($val instanceof ModelCollectionInterface || $val instanceof ModelInterface) {
                    $object->$key = $val->asObject();

                } else {
                    $object->$key = $val;
                }
            }
        }

        return $object;
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function asArray($full = false)
    {

        if (!is_bool($full)) {
            throw new \InvalidArgumentException('$full must be boolean');
        }

        $array = array();

        foreach ($this->schema as $key => $value) {
            if (isset($this->$key)) {
                $methodName = 'get' . ucfirst($key);
                $val = $value->$methodName();

                if ($val instanceof ModelCollectionInterface || $val instanceof ModelInterface) {
                    $array[$key] = $val->asArray();

                } else {
                    $array[$key] = $val;
                }
            }
        }

        return $array;
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function setId($id)
    {

        $this->id = Filter::factory('int')->filter($id);
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function setActivity($activity)
    {

        $this->activity = Filter::factory('int,max:1')->filter($activity);
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function getActivity()
    {

        return $this->activity;
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function setCreatedAt($timestamp)
    {

        $this->createdAt = Filter::factory('int')->filter($timestamp);
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function getCreatedAt()
    {

        return $this->createdAt;
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function setModifiedAt($timestamp)
    {
        $this->modifiedAt = Filter::factory('int')->filter($timestamp);
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }
}
