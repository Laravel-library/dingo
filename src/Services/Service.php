<?php

namespace Dingo\Services;

use Dingo\Boundary\Factory;
use Dingo\Services\Contacts\DataAccess;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

readonly class Service implements DataAccess
{
    protected Factory $app;

    public function __construct(Factory $factory)
    {
        $this->app = $factory;
    }

    public function createOrUpdate(array $attributes): Builder|Model
    {
        // TODO: Implement createOrUpdate() method.
    }

    public function delete(mixed $value): int
    {
        // TODO: Implement delete() method.
    }

    public function deleteMany(mixed $values): int
    {
        // TODO: Implement deleteMany() method.
    }
}