<?php

namespace Dingo;

use Dingo\Boundary\Contacts\Factory;
use Dingo\Caches\Cacheable;
use Dingo\Guesser\CacheGuesser;
use Dingo\Guesser\Contacts\Guesser;
use Dingo\Guesser\QueryGuesser;
use Dingo\Query\Query;
use Dingo\Repositories\Repository;
use Dingo\Services\Service;
use Dingo\Support\Builder\Aggregator;
use Dingo\Support\Builder\CaseHandler;
use Dingo\Support\Builder\Contacts\CaseProcessor;
use Dingo\Support\Builder\Contacts\JsonConverter;
use Dingo\Support\Builder\JsonHandler;
use Illuminate\Support\Facades\Redis;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->bindingRepositoryDepends();

        $this->bindingCacheableDepends();

        $this->bindingGuesser();

        $this->bindingServiceDepends();

        $this->bindingQueryDepends();
    }

    protected function bindingQueryDepends(): void
    {
        $this->app->when(Query::class)
            ->needs(Guesser::class)
            ->give(fn() => new QueryGuesser());
    }

    protected function bindingRepositoryDepends(): void
    {
        $this->app->when(Repository::class)
            ->needs(Support\Builder\Contacts\Aggregator::class)
            ->give(Aggregator::class);

        $this->app->when(Repository::class)
            ->needs(CaseProcessor::class)
            ->give(CaseHandler::class);

        $this->app->when(Repository::class)
            ->needs(JsonConverter::class)
            ->give(JsonHandler::class);
    }

    protected function bindingServiceDepends(): void
    {
        $this->app->when(Service::class)
            ->needs(Factory::class)
            ->give(Boundary\Factory::class);
    }

    protected function bindingGuesser(): void
    {
        $this->app->when([Repository::class, Service::class])
            ->needs(Guesser::class)
            ->give(QueryGuesser::class);
    }

    protected function bindingCacheableDepends(): void
    {
        $this->app->when(Cacheable::class)
            ->needs(Guesser::class)
            ->give(CacheGuesser::class);

        $this->app->when(Cacheable::class)
            ->needs(\Redis::class)
            ->give(fn() => Redis::connection()->client());
    }
}