<?php

namespace Dingo\Caches;

use Dingo\Boundary\Connection\Contacts\Connector;
use Dingo\Caches\Contacts\Cacheable;
use Dingo\Support\Guesser\Contacts\Resolvable;
use Redis;

abstract readonly class Cache implements Cacheable
{

    protected Redis $redis;

    protected string $key;

    private Resolvable $resolvable;

    public function __construct(Connector $connector, Resolvable $resolvable)
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