<?php

namespace Dingo;

use Dingo\Boundary\Connection\CacheConnector;
use Dingo\Boundary\Connection\Contacts\Connector;
use Dingo\Boundary\Factory\Application;
use Dingo\Boundary\Factory\Contacts\Factory;
use Dingo\Query\Contacts\Queryable;
use Dingo\Query\QueryBuilder;
use Dingo\Resolution\Contacts\Resolvable;
use Dingo\Resolution\QueryResolver;
use Dingo\Support\Guesser\CacheGuesser;
use Dingo\Support\Guesser\Contacts\Guessable;
use Dingo\Support\Guesser\QueryGuesser;
use Illuminate\Container\Container;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Connector::class, CacheConnector::class);

        $this->app->singleton(Guessable::class, fn() => new CacheGuesser());

        $this->app->singleton(Queryable::class, QueryBuilder::class);

        $this->app->singleton(Factory::class, fn(Container $app) => new Application($app));

        $this->app->singleton(Resolvable::class, fn(Container $app) => new QueryResolver(new QueryGuesser(), $app->make(Factory::class)));
    }
}