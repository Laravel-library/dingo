<?php

declare(strict_types=1);

namespace Dingo\Query;

use Dingo\Boundary\Factory\Contacts\Factory;
use Dingo\Query\Contacts\Resolvable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;
use Illuminate\Database\Eloquent\Model;

final readonly class QueryBuilder implements Contacts\Queryable
{
    protected Factory $factory;

    protected Resolvable $resolvable;

    public function __construct(Factory $factory, Resolvable $resolvable)
    {
        $this->factory = $factory;

        $this->resolvable = $resolvable;
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
        return $this->factory->app($this->resolvable->getConcrete());
    }
}