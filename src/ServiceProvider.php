<?php

namespace Dingo;

use Dingo\Boundary\Connection\CacheConnector;
use Dingo\Boundary\Connection\Contacts\Connector;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Connector::class, CacheConnector::class);
    }
}