<?php

namespace Dingo\Caches;

use Dingo\Boundary\Connection\Contacts\Connector;
use Dingo\Caches\Contacts\Cacheable;
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