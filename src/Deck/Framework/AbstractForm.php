<?php

namespace Deck\Framework;

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
abstract class AbstractForm
{

    /**
     * @var
     */
    protected $schema;

    /**
     * @var
     */
    protected $filter;

    /**
     * @var
     */
    protected $data;

    /**
     * @var
     */
    protected $allowedHtmlTags;

    /**
     * The short description
     *
     * @access protected
     * @param  type [ $varname] description
     * @return type description
     */
    public function __construct($schema, array $data = null, $tags = null)
    {
        $this->schema = $schema;
        $this->filter = new Filter();

        if ($tags && is_string($tags)) {
            $this->allowedHtmlTags = $tags;
        }

        if ($data) {
            $this->data = $data;
        }
    }

    /**
     * The short description
     *
     * @access protected
     * @param  type [ $varname] description
     * @return type description
     */
    protected function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * The short description
     *
     * @access protected
     * @param  type [ $varname] description
     * @return type description
     */
    protected function prepare()
    {
        $this->data = array_map('trim', $this->data);
    }
}
