<?php

namespace Dingo;

use Dingo\Boundary\Application;
use Dingo\Boundary\Contacts\Factory;
use Dingo\Caches\Cache;
use Dingo\Repositories\Repository;
use Dingo\Services\Service;
use Dingo\Support\Builder\Aggregator;
use Dingo\Support\Builder\CaseHandler;
use Dingo\Support\Builder\Contacts\CaseProcessor;
use Dingo\Support\Builder\Contacts\JsonConverter;
use Dingo\Support\Builder\JsonHandler;
use Dingo\Support\Guesser\CacheGuesser;
use Dingo\Support\Guesser\Contacts\Resolvable;
use Dingo\Support\Guesser\QueryGuesser;
use Illuminate\Support\Facades\Redis;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->bindingRepositoryDepends();

        $this->bindingCacheableDepends();

        $this->bindSameDepends();
    }

    protected function bindSameDepends(): void
    {
        $this->app->when([Service::class, Repository::class])
            ->needs(Factory::class)
            ->give(Application::class);

        $this->app->when([Service::class, Repository::class])
            ->needs(Resolvable::class)
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