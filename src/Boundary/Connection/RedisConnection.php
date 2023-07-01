<?php

namespace Dingo\Boundary\Connection;

use Dingo\Boundary\Connection\Contacts\Connector;
use Illuminate\Redis\RedisManager;
use Redis;

final readonly class RedisConnection implements Connector
{
    protected RedisManager $redisManager;

    public function __construct(RedisManager $redisManager)
    {
        $this->redisManager = $redisManager;
    }

    public function client(): Redis
    {
        return $this->redisManager->connection()->client();
    }

    public function connection(): string
    {
        return 'cache';
    }
}