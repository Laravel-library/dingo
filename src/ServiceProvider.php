<?php

namespace Dingo;

use Dingo\Boundary\Connection\Contacts\Connector;
use Dingo\Boundary\Connection\CacheConnector;
use Dingo\Boundary\Factory\Application;
use Dingo\Boundary\Factory\Contacts\Factory;
use Dingo\Caches\Cache;
use Dingo\Query\Contacts\Queryable;
use Dingo\Query\Contacts\Resolvable;
use Dingo\Query\QueryBuilder;
use Dingo\Query\Resolver;
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

        $this->registerSingleton();

        $this->bindingCacheableContextual();

        $this->sameContextualBindings();
    }

    protected function registerSingleton(): void
    {

        $this->app->singleton(Connector::class,new CacheConnector($this->app->make('redis')));

        $this->app->singleton(Factory::class, fn(Container $app) => new Application($app));

        $this->app->singleton(Resolvable::class, fn(Container $app) => new Resolver(new QueryGuesser(), $app->make(Factory::class)));
    }

    protected function sameContextualBindings(): void
    {
        $this->app->bind(Queryable::class, QueryBuilder::class);

        $this->app->when([Service::class, Repository::class])
            ->needs(Queryable::class)
            ->give(Queryable::class);
    }

    protected function bindingCacheableContextual(): void
    {

        $this->app->bind(Guessable::class, fn() => new CacheGuesser());

        $this->app->when(Cache::class)
            ->needs(Guessable::class)
            ->give(Guessable::class);

        $this->app->when(Cache::class)
            ->needs(Connector::class)
            ->give(Connector::class);
    }
}