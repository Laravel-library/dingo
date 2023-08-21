<?php

namespace Elephant\Facades;

use Elephant\Contacts\Connection\Connector;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void withConnection(string $name)
 */
class RedisClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Connector::class;
    }
}