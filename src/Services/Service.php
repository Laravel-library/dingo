<?php

declare(strict_types=1);

namespace Dingo\Services;

use Dingo\Query\Contacts\Queryable;
use Dingo\Services\Contacts\DataAccess;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

readonly class Service implements DataAccess
{

    protected Queryable $queryable;

    public function __construct(Queryable $queryable)
    {
        $this->queryable = $queryable;

        $this->queryable->though(get_class($this));
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

    public function updateJson(array|string $attributes): void
    {

    }

    public function delete(mixed $value, string $by = 'id'): int
    {
        return $this->queryable->builder()->where($by, $value)->delete();
    }
}