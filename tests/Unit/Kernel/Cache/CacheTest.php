<?php

namespace Tests\Unit\Kernel\Cache;

use Dingo\Boundary\Connection\CacheConnector;
use Dingo\Caches\Cache;
use Dingo\Support\Guesser\CacheGuesser;
use Illuminate\Redis\RedisManager;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Kernel\BootStrap;

class CacheTest extends TestCase
{

    #[DataProvider('getExampleCache')]
    public function testCacheInstanceOfAbstractCache(ExampleCache $cache): void
    {
        $this->assertInstanceOf(Cache::class, $cache);
    }

    public static function getExampleCache(): array
    {
        BootStrap::boot();

        CacheConnector::customConnection('cache');

        return [
            [new ExampleCache(
                CacheConnector::getInstance(new RedisManager(BootStrap::app(),'redis',[])),
                BootStrap::app()->make(CacheGuesser::class)
             )],
        ];
    }
}