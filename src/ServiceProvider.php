<?php

namespace Dingo;

use Dingo\Boundary\Factory\Application;
use Dingo\Caches\Cache;
use Dingo\Query\Contacts\Queryable;
use Dingo\Repositories\Repository;
use Dingo\Services\Service;
use Dingo\Support\Guesser\CacheGuesser;
use Dingo\Support\Guesser\Contacts\Resolvable;
use Dingo\Support\Guesser\QueryGuesser;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Redis;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {

        $this->bindingCacheableDepends();

        $this->bindSameDepends();
    }

    protected function bindSameDepends(): void
    {
        $this->app->when([Service::class, Repository::class])
            ->needs(Queryable::class)
            ->give(fn(Container $app) => new Query\Queryable(
                new QueryGuesser(), new Application($app)
            ));
    }

    protected function bindingCacheableDepends(): void
    {
        $this->app->when(Cache::class)
            ->needs(Resolvable::class)
            ->give(fn() => new CacheGuesser());

        $this->app->when(Cache::class)
            ->needs(\Redis::class)
            ->give(fn() => Redis::connection()->client());
    }
}