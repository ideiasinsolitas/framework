<?php

namespace Deck\Application;

use Deck\Types\HookInterface;

class StateManager
{
    protected $state;
    protected $possibleStates = array();
    protected $hooks;
    protected $container;
    protected $controller;

    public function __construct(Container $container = null)
    {
        if ($container) {
            $this->container = $container;
        }
    }

    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    public function getContainer()
    {
        return $this->container;
    }

    protected function apply($state)
    {
        foreach ($this->hooks[$state] as $hook) {
            $hook->run();
        }
    }

    public function change($state)
    {
        $this->state = $state;
        $this->apply($state);
    }

    public function registerHook($state, $hook)
    {
        if (!isset($this->hooks[$state])) {
            $this->hooks[$state] = array();
        }
        
        $this->hooks[$state][] = new $hook($this->container);
    }
}
