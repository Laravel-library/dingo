<?php

namespace Dingo\Caches;

use Dingo\Boundary\Connection\Contacts\Connector;
use Dingo\Caches\Contacts\Cacheable;
use Dingo\Support\Guesser\Contacts\Guessable;
use Redis;

abstract readonly class Cache implements Cacheable
{

    protected Redis $redis;

    protected string $key;

    private Guessable $resolvable;

    public function __construct(Connector $connector, Guessable $resolvable)
    {
        $this->redis = $connector->client();

        $this->resolvable = $resolvable;

        $this->key = $this->generateKey();
    }

    public function generateKey(): string
    {
        return $this->resolvable->guess(get_class($this))->getResolved();
    }
}