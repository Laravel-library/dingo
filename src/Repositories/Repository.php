<?php

namespace Dingo\Repositories;

use Dingo\Query\Contacts\Queryable;
use Dingo\Repositories\Contacts\Query;
use Koala\Guesses\Contacts\Resolvable;
use Illuminate\Database\Eloquent\Model;

abstract readonly class Repository implements Query
{
    protected Queryable $queryable;

    public function __construct(Queryable $queryable, Resolvable $resolvable)
    {
        $resolvable->binding(get_class($this));

        $this->queryable = $queryable;
    }

    public function latest(string $column): ?Model
    {
        return $this->queryable->builder()->orderByDesc($column)->limit(1)->first();
    }
}