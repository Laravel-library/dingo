<?php

declare(strict_types=1);

namespace Dingo\Query;

use Dingo\Query\Contacts\Resolvable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;
use Illuminate\Database\Eloquent\Model;

final readonly class QueryBuilder implements Contacts\Queryable
{
    protected Resolvable $resolvable;

    public function __construct(Resolvable $resolvable)
    {
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
        return $this->resolvable->getConcrete();
    }
}