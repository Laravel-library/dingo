<?php

namespace Dingo\Services;

use Closure;
use Dingo\Boundary\Contacts\Factory;
use Dingo\Guesser\Contacts\Resolvable;
use Dingo\Query\Contacts\Queryable;
use Dingo\Services\Contacts\DataAccess;
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

        $this->model = $this->factory->app(
            $this->resolvable->resolve(get_class($this))->getResolved()
        );
    }

    public function createOrUpdate(array $attributes, string $by = 'id'): Builder|Model
    {

    }

    public function delete(mixed $value, string $by = 'id'): int
    {
        // TODO: Implement delete() method.
    }

    public function deleteMany(array|Closure $values): int
    {
        // TODO: Implement deleteMany() method.
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