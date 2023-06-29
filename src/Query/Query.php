<?php

namespace Dingo\Query;

use Dingo\Boundary\Contacts\Factory;
use Dingo\Guesser\Contacts\Guesser;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;

readonly class Query implements Contacts\Queryable
{

    protected Guesser $guesser;

    protected Factory $factory;

    public function __construct(Guesser $guesser, Factory $factory)
    {
        $this->guesser = $guesser;

        $this->factory = $factory;
    }

    public function query(): rawQuery
    {
        return $this->builder()->newQuery();
    }

    public function builder(): Builder
    {
        return $this->guesser->getName()::query();
    }

    public function table(): string
    {
        return $this->factory->app($this->guesser->getName())->table;
    }
}