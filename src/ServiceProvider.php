<?php

namespace Dingo;

use Dingo\Boundary\Connection\RedisConnection;
use Dingo\Boundary\Factory\Application;
use Dingo\Caches\Cache;
use Dingo\Query\Contacts\Queryable;
use Dingo\Query\QueryBuilder;
use Dingo\Repositories\Repository;
use Dingo\Services\Service;
use Dingo\Support\Guesser\CacheGuesser;
use Dingo\Support\Guesser\Contacts\Resolvable;
use Dingo\Support\Guesser\QueryGuesser;
use Illuminate\Container\Container;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {

        $this->bindingCacheableDepends();

        $this->sameContextualBindings();
    }

    protected function sameContextualBindings(): void
    {
        $this->app->bind(Queryable::class,
            fn(Container $app) => new QueryBuilder(
            new QueryGuesser(),
            new Application($app),
        ));

        $this->app->when([Service::class, Repository::class])
            ->needs(Queryable::class)
            ->give(Queryable::class);
    }

    protected function bindingCacheableDepends(): void
    {
        $this->app->when(Cache::class)
            ->needs(Resolvable::class)
            ->give(fn() => new CacheGuesser());

        $this->app->when(Cache::class)
            ->needs(\Redis::class)
            ->give(fn(Container $app) => new RedisConnection($app->get('redis')));
    }
}