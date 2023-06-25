<?php

namespace Dingo;

use Dingo\Caches\Cacheable;
use Dingo\Repositories\Repository;
use Dingo\Support\Builder\Aggregator;
use Dingo\Support\Builder\CaseHandler;
use Dingo\Support\Builder\Contacts\CaseProcessor;
use Dingo\Support\Builder\Contacts\JsonConverter;
use Dingo\Support\Builder\JsonHandler;
use Dingo\Support\Guesser\CacheGuesser;
use Dingo\Support\Guesser\Contacts\Guesser;
use Dingo\Support\Guesser\QueryGuesser;
use Illuminate\Support\Facades\Redis;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->bindingRepositoryDepends();
        $this->bindingCacheableDepends();
    }

    protected function bindingRepositoryDepends(): void
    {
        $this->app->when(Repository::class)
            ->needs(\Dingo\Support\Builder\Contacts\Aggregator::class)
            ->give(Aggregator::class);

        $this->app->when(Repository::class)
            ->needs(CaseProcessor::class)
            ->give(CaseHandler::class);

          $this->app->when(Repository::class)
            ->needs(JsonConverter::class)
            ->give(JsonHandler::class);

        $this->app->when(Repository::class)
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