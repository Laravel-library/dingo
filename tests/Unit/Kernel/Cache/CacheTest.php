<?php

namespace Tests\Unit\Kernel\Cache;

use Dingo\Boundary\Connection\CacheConnector;
use Dingo\Caches\Cache;
use Dingo\Support\Facades\RedisClient;
use Dingo\Support\Guesser\CacheGuesser;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Redis\RedisManager;
use Illuminate\Support\Facades\Facade;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Kernel\BootStrap;

class CacheTest extends TestCase
{

    #[DataProvider('getExampleCache')]
    public function testCacheConnection(ExampleCache $cache): void
    {
        $this->assertInstanceOf(Cache::class, $cache);
    }

    /**
     * @throws BindingResolutionException
     */
    public static function getExampleCache(): array
    {
        BootStrap::boot();

        Facade::setFacadeApplication(BootStrap::app());

        RedisClient::withConnection('cache');

        return [
            [BootStrap::app()->make(ExampleCache::class)],
        ];
    }
}