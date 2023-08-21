<?php

namespace Elephant\Caches;

use Elephant\Boundary\Connection\Contacts\Connector;
use Elephant\Contacts\Cache\Cacheable;
use Guessable;
use Redis;

abstract readonly class Cache implements Cacheable
{

    protected Redis $redis;

    protected string $key;

    private Guessable $guessable;

    public function __construct(Connector $connector, Guessable $guessable)
    {
        $this->redis = $connector->client();

        $this->guessable = $guessable;

        $this->key = $this->generateKey();
    }

    public function generateKey(): string
    {
        return $this->guessable->guess(get_class($this))->getResolved();
    }
}