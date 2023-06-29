<?php

namespace Dingo\Services;

use Closure;
use Dingo\Boundary\Contacts\Factory;
use Dingo\Guesser\Contacts\Guesser;
use Dingo\Services\Contacts\DataAccess;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

readonly class Service implements DataAccess
{
    protected Factory $app;

    protected Guesser $guesser;

    public function __construct(Factory $factory, Guesser $guesser)
    {
        $this->app = $factory;

        $this->guesser = $guesser;
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

    private function prepareException(int|string $id): void
    {

    }
}