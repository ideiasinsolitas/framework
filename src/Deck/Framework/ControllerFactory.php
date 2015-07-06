<?php

namespace Deck\Framework;

use Deck\Framework\Controller\AbstractController;
use Deck\Application\Container;
use Deck\Types\FactoryInterface;

class ControllerFactory implements FactoryInterface
{
    protected $resolver;
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function make($resource)
    {
        $name = $this->container['app.resolver']->resolve($resource);
        $class = $name . 'Controller';
        $controller = new $class($this->container);
        return $controller;
    }
}
