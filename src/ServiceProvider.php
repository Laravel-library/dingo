<?php

declare(strict_types=1);

namespace Elephant;

use Elephant\Caches\Connection\CacheConnector;
use Elephant\Contacts\Connection\Connector;
use Elephant\Contacts\Guesses\Guessable;
use Elephant\Contacts\Guesses\Resolvable;
use Elephant\Guesses\Cache\CacheGuesser;
use Elephant\Guesses\Repositories\ModelGuesser;
use Elephant\Guesses\Repositories\ModelResolver;
use Illuminate\Contracts\Container\Container;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Connector::class, CacheConnector::class);

        $this->app->singleton(Guessable::class,fn() => new CacheGuesser());

        $this->app->singleton(Resolvable::class,fn(Container $app) => new ModelResolver(new ModelGuesser(),$app));
    }
}