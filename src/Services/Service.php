<?php

namespace Dingo\Services;

use Dingo\Boundary\Factory\Contacts\Factory;
use Dingo\Query\Contacts\Queryable;
use Dingo\Services\Contacts\DataAccess;
use Dingo\Support\Guesser\Contacts\Resolvable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;
use Illuminate\Database\Eloquent\Model;

readonly class Service implements DataAccess, Queryable
{

    private Resolvable $resolvable;

    private Factory $factory;

    private Model $model;

    public function __construct(Resolvable $resolvable, Factory $factory)
    {
        $this->resolvable = $resolvable;

        $this->factory = $factory;

        $this->configure();
    }

    private function configure(): void
    {
        $modelName = $this->resolvable->guess(get_class($this))->getResolved();

        $this->model = $this->factory->app($modelName);
    }

    public function createOrUpdate(array $attributes, string $by = 'id'): Builder|Model
    {
        if ($byValue = $attributes[$by] ?? null) {

            if ($by === 'id') {
                unset($attributes[$by]);
            }

            return $this->builder()->updateOrCreate([$by => $byValue], $attributes);
        }

        return $this->builder()->create($attributes);
    }

    public function delete(mixed $value, string $by = 'id'): int
    {
        return $this->builder()->where($by, $value)->delete();
    }

    public function query(): rawQuery
    {
        return $this->model->newQuery();
    }

    public function builder(): Builder
    {
        return $this->model->newModelQuery();
    }
}