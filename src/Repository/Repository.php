<?php

declare(strict_types=1);

namespace Elephant\Repository;

use Elephant\Contacts\Guesses\Resolvable;
use Elephant\Contacts\Repository\Queryable;
use Elephant\Contacts\Repository\Repositories;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;
use Illuminate\Database\Eloquent\Model;

abstract readonly class Repository implements Repositories, Queryable
{
    use DataAccessTrait;

    private Resolvable $resolvable;

    public function __construct(Resolvable $resolvable)
    {
        $this->resolvable = $resolvable;
    }

    final public function table(): string
    {
        return $this->model()->getTable();
    }

    final public function query(): rawQuery
    {
        return $this->model()->newQuery();
    }

    final public function builder(): Builder
    {
        return $this->model()->newModelQuery();
    }

    public function model(): Model
    {
        return $this->resolvable->binding(get_class($this))->getConcrete();
    }
}