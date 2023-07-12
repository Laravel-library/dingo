<?php

namespace Tests\Unit\Kernel\Cache;

use Dingo\Caches\Cache;
use Dingo\Support\Facades\RedisClient;
use Illuminate\Contracts\Container\BindingResolutionException;
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