<?php

namespace Dingo\Repositories;

use Dingo\Boundary\Contacts\Factory;
use Dingo\Guesser\Contacts\Resolvable;
use Dingo\Query\Contacts\DataAccess;
use Dingo\Query\Contacts\Queryable;
use Dingo\Support\Builder\Contacts\Aggregator;
use Dingo\Support\Builder\Contacts\Aliasable;
use Dingo\Support\Builder\Contacts\CaseProcessor;
use Dingo\Support\Builder\Contacts\JsonConverter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;
use Illuminate\Database\Eloquent\Model;

readonly class Repository implements Queryable,DataAccess
{
    protected Aggregator|Aliasable $aggregator;

    protected CaseProcessor|Aliasable $caseProcessor;

    protected JsonConverter|Aliasable $jsonConverter;

    private Resolvable $resolvable;

    private Factory $factory;

    public function __construct(Aggregator $aggregator, CaseProcessor $processor, JsonConverter $converter, Resolvable $resolvable, Factory $factory)
    {
        $this->aggregator = $aggregator;

        $this->caseProcessor = $processor;

        $this->jsonConverter = $converter;

        $this->resolvable = $resolvable;

        $this->factory = $factory;
    }

    public function query(): rawQuery
    {
        return $this->model()->newQuery();
    }

    public function builder(): Builder
    {
        return $this->model()->newModelQuery();
    }

    public function table(): string
    {
        return $this->model()->getTable();
    }

    public function model(): Model
    {
        $class = $this->resolvable->resolve(get_class($this))->getResolved();

        return $this->factory->app($class);
    }
}