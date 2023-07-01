<?php

namespace Dingo\Caches;

use Dingo\Caches\Contacts\Cacheable;
use Dingo\Caches\Contacts\Connection;
use Dingo\Support\Guesser\Contacts\Resolvable;
use Redis;

readonly class Cache implements Connection, Cacheable
{

    private Redis $redis;

    protected string $key;

    private Resolvable $resolvable;

    public function __construct(Redis $redis, Resolvable $resolvable)
    {
        $this->redis = $redis;

        $this->resolvable = $resolvable;

        $this->key = $this->generateKey();
    }

    final public function client(): Redis
    {
        return $this->redis;
    }

    public function generateKey(): string
    {
        return $this->resolvable->guess(get_class($this))->getResolved();
    }
}