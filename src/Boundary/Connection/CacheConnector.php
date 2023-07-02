<?php

namespace Dingo\Boundary\Connection;

use Dingo\Boundary\Connection\Contacts\Connector;
use Illuminate\Redis\RedisManager;
use Redis;

final class CacheConnector implements Connector
{
    protected RedisManager $redisManager;

    protected static ?string $connection = null;

    private static ?self $instance = null;

    private function __construct(RedisManager $redisManager)
    {
        $this->redisManager = $redisManager;
    }

    public function client(): Redis
    {
        return $this->redisManager->connection($this->connection())->client();
    }

    public function connection(): string
    {
        return is_null(self::$connection) ? 'default' : self::$connection;
    }

    public static function customConnection(string $name = null): void
    {
        if (!is_null($name)) {
            self::$connection = $name;
        }
    }

    public static function getInstance(RedisManager $redisManager): self
    {
        if (empty(self::$instance)) {
            self::$instance = new self($redisManager);
        }

        return self::$instance;
    }
}