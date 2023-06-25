<?php

namespace Dingo\Services;

use Dingo\Boundary\Contacts\Factory;
use Dingo\Services\Contacts\DataAccess;
use Dingo\Support\Guesser\Contacts\Guesser;
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