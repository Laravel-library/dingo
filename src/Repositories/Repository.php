<?php

namespace Dingo\Repositories;

use Dingo\Boundary\Contacts\Factory;
use Dingo\Query\Contacts\DataAccess;
use Dingo\Query\Contacts\Queryable;
use Dingo\Support\Guesser\Contacts\Resolvable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;
use Illuminate\Database\Eloquent\Model;

readonly class Repository implements Queryable, DataAccess
{
    private Resolvable $resolvable;

    private Factory $factory;

    public function __construct(Resolvable $resolvable, Factory $factory)
    {
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
        $class = $this->resolvable->guess(get_class($this))->getResolved();

        return $this->factory->app($class);
    }
}