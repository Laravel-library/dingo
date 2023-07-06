<?php

namespace Dingo\Query;

use Dingo\Boundary\Factory\Contacts\Factory;
use Dingo\Support\Guesser\Contacts\Resolvable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;
use Illuminate\Database\Eloquent\Model;

final class QueryBuilder implements Contacts\Queryable
{
    protected ?string $className = null;

    protected ?Model $model = null;

    private readonly Resolvable $resolvable;

    private readonly Factory $factory;

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
        if ($this->hasModel()) {
            return $this->model;
        }

        return $this->resolveModel();
    }

    protected function hasModel(): bool
    {
        return !is_null($this->model);
    }

    protected function resolveModel(): Model
    {
        $class = $this->resolvable->guess(get_class($this))->getResolved();

        $this->model = $this->factory->app($class);

        return $this->model;
    }

    public function binding(string $class): void
    {
        $this->className = $class;
    }
}