<?php

declare(strict_types=1);

namespace Dingo\Query;

use Dingo\Boundary\Factory\Contacts\Factory;
use Dingo\Support\Guesser\Contacts\Resolvable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;
use Illuminate\Database\Eloquent\Model;

final class QueryBuilder implements Contacts\Queryable
{
    protected ?string $modelName = null;

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
        return $this->hasModel() ? $this->model : $this->resolveModel();
    }

    protected function hasModel(): bool
    {
        return !is_null($this->model);
    }

    protected function resolveModel(): Model
    {
        $this->prepareClass();

        $this->model = $this->factory->app($this->modelName);

        return $this->model;
    }

    protected function prepareClass(): void
    {
        if (!$this->hasClass()) {
            $this->modelName = $this->resolvable->guess($this->modelName)->getResolved();
        }
    }

    protected function hasClass(): bool
    {
        return !is_null($this->modelName);
    }

    public function binding(string $class): void
    {
        $this->modelName = $class;
    }
}