<?php

namespace Dingo\Caches;

use Dingo\Caches\Contacts\Connection;
use Dingo\Caches\Contacts\Generator;
use Dingo\Support\Guesser\Contacts\Guesser;
use Redis;

readonly class Cacheable implements Connection, Generator
{

    private Redis $redis;

    protected string $slug;

    private Guesser $guesser;

    public function __construct(Redis $redis, Guesser $guesser)
    {
        $this->redis   = $redis;

        $this->guesser = $guesser;

        $this->slug = $this->slug();
    }

    final public function client(): Redis
    {
        return $this->redis;
    }

    public function slug(): string
    {
        return $this->guesser->getName();
    }
}