<?php

declare(strict_types=1);

namespace Dingo\Query;

use Dingo\Boundary\Factory\Contacts\Factory;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;
use Illuminate\Database\Eloquent\Model;

final readonly class QueryBuilder implements Contacts\Queryable
{
    protected Factory $factory;

    public function __construct(Factory $factory)
    {
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

    }
}