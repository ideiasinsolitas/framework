<?php

namespace Deck\Framework;

use Deck\Framework\AbstractRepository;
use Deck\Framework\DatabaseClientInterface;
use Deck\Types\FactoryInterface;
use Deck\Types\ResolverInterface;

class RepositoryFactory implements FactoryInterface
{

    protected $resolver;
    protected $client;

    public function __construct(DatabaseClientInterface $client, ResolverInterface $resolver)
    {
        $this->client = $client;
        $this->resolver = $resolver;
    }

    public function make($resource)
    {
        $class = $this->resolver->resolve($resource) . 'Repository';
        $repository = new $class($this->client);
        return $repository;
    }
}
