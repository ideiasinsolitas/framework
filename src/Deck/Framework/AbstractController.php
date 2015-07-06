<?php

namespace Deck\Framework\Controller;

use Deck\Application\Container;

/**
 * The short description
 *
 * As many lines of extendend description as you want {@link element}
 * links to an element
 * {@link http://www.example.com Example hyperlink inline link} links to
 * a website. The inline
 *
 * @package Deck
 * @author  Pedro Koblitz
 */
abstract class AbstractController
{

    /**
     * @var
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Gets the value of container.
     *
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Sets the value of container.
     *
     * @param mixed $container the container
     *
     * @return self
     */
    protected function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     *
     *
     *
     * @access       public
     * @param        type [ $varname] description
     * @return       type description
     */
    public function catchException(\Exception $e)
    {
        if ($e instanceof \DomainException) {
            $msg = "You are not authorized to perform this action.";

        } elseif ($e instanceof \InvalidArgumentException || $e instanceof \BadMethodCallException) {
            $msg = "Invalid data was provided by the client.";

        } else {
            $msg = "Resource not found.";
        }

        $this->container['app.state']->change('error.catch.before');
        $result = array();
        $result['_messages'] = array();
        $message = $msg . ' ' . $e->getMessage() . " <br>\nFile: " . $e->getFile() . ' in line ' . $e->getLine();
        $result['_messages'][] = $message;
        $this->container['system.log']->addError($message);
        $this->container['app.state']->change('error.catch.after');

        return $result;
    }
}
