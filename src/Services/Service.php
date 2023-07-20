<?php

namespace Dingo\Services;

use Dingo\Query\Contacts\Queryable;
use Dingo\Resolution\Contacts\Resolvable;
use Dingo\Services\Contacts\DataAccess;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract readonly class Service implements DataAccess
{

    protected Queryable $queryable;

    public function __construct(Queryable $queryable, Resolvable $resolvable)
    {
        $resolvable->binding(get_class($this));

        $this->queryable = $queryable;
    }

    public function createOrUpdate(array $attributes, string $by = 'id'): Builder|Model
    {
        if ($byValue = $attributes[$by] ?? null) {

            if ($by === 'id') {
                unset($attributes[$by]);
            }

            return $this->queryable->builder()->updateOrCreate([$by => $byValue], $attributes);
        }

        return $this->queryable->builder()->create($attributes);
    }

    public function delete(mixed $value, string $by = 'id'): int
    {
        return $this->queryable->builder()->where($by, $value)->delete();
    }
}