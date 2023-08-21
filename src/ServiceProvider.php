<?php

declare(strict_types=1);

namespace Elephant;

use Elephant\Boundary\Connection\CacheConnector;
use Elephant\Boundary\Connection\Contacts\Connector;
use Elephant\Contacts\Guesses\Resolvable;
use Elephant\Guesses\Repositories\ModelGuesser;
use Elephant\Guesses\Repositories\ModelResolver;
use Illuminate\Contracts\Container\Container;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Connector::class, CacheConnector::class);

        $this->app->singleton(Resolvable::class,fn(Container $app) => new ModelResolver(new ModelGuesser(),$app));
    }
}