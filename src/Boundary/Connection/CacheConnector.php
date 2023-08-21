<?php

namespace Elephant\Boundary\Connection;

use Elephant\Boundary\Connection\Contacts\Connector;
use Illuminate\Redis\RedisManager;
use Redis;

final class CacheConnector implements Connector
{
    protected readonly RedisManager $redisManager;

    protected ?string $connection = null;

    public function __construct(RedisManager $redisManager)
    {
        $this->redisManager = $redisManager;
    }

    public function client(): Redis
    {
        return $this->redisManager->connection($this->connection())->client();
    }

    public function connection(): string
    {
        return $this->connection ?? $this->defaultConnection();
    }

    public function defaultConnection(): string
    {
        return 'default';
    }

    public function withConnection(string $name): void
    {
        $this->connection = $name;
    }
}