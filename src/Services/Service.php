<?php

namespace Dingo\Services;

use Dingo\Boundary\Contacts\Factory;
use Dingo\Boundary\DB\Contacts\Transaction;
use Dingo\Guesser\Contacts\Guesser;
use Dingo\Services\Contacts\DataAccess;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

readonly class Service implements DataAccess
{
    protected Factory $app;

    protected Guesser $guesser;

    protected Transaction $transaction;

    public function __construct(Factory $factory, Guesser $guesser, Transaction $transaction)
    {
        $this->app = $factory;

        $this->guesser = $guesser;

        $this->transaction = $transaction;
    }

    public function createOrUpdate(array $attributes, string $by = 'id'): Builder|Model
    {
        // TODO: Implement createOrUpdate() method.
    }

    public function delete(mixed $value, string $by = 'id'): int
    {
        // TODO: Implement delete() method.
    }

    public function deleteMany(mixed $values): int
    {
        // TODO: Implement deleteMany() method.
    }
}