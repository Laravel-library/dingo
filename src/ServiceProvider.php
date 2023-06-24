<?php

namespace Dingo;

use Dingo\Caches\Cacheable;
use Dingo\Repositories\Repository;
use Dingo\Support\Builder\Aggregator;
use Dingo\Support\Builder\CaseHandler;
use Dingo\Support\Builder\Contacts\Queryable;
use Dingo\Support\Guesser\CacheGuesser;
use Dingo\Support\Guesser\Contacts\Guesser;
use Dingo\Support\Guesser\QueryGuesser;
use Illuminate\Contracts\Support\Jsonable;
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
            ->needs(Queryable::class)
            ->give([
                $this->app->make(Aggregator::class),
                $this->app->make(CaseHandler::class),
                $this->app->make(Jsonable::class),
            ]);

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