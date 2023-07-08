<?php

namespace Dingo;

use Dingo\Boundary\Connection\Contacts\Connector;
use Dingo\Boundary\Connection\CacheConnector;
use Dingo\Boundary\Factory\Application;
use Dingo\Caches\Cache;
use Dingo\Query\Contacts\Queryable;
use Dingo\Query\QueryBuilder;
use Dingo\Repositories\Repository;
use Dingo\Services\Service;
use Dingo\Support\Guesser\CacheGuesser;
use Dingo\Support\Guesser\Contacts\Guessable;
use Dingo\Support\Guesser\QueryGuesser;
use Illuminate\Container\Container;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {

        $this->bindingCacheableContextual();

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

    protected function bindingCacheableContextual(): void
    {
        $this->app->bind(
            Connector::class,
            fn(Container $app) => CacheConnector::getInstance($app->make('redis'))
        );

        $this->app->bind(Guessable::class, fn() => new CacheGuesser());

        $this->app->when(Cache::class)
            ->needs(Guessable::class)
            ->give(Guessable::class);

        $this->app->when(Cache::class)
            ->needs(Connector::class)
            ->give(Connector::class);
    }
}