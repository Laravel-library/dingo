<?php

namespace Dingo\Query;

use Dingo\Boundary\Contacts\Factory;
use Dingo\Guesser\Contacts\Guesser;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;

readonly class Query implements Contacts\Queryable
{

    protected Guesser $guesser;

    protected Factory $factory;

    public function __construct(Guesser $guesser, Factory $factory)
    {
        $this->guesser = $guesser;

        $this->factory = $factory;
    }

    public function builder(): Builder
    {
        // TODO: Implement builder() method.
    }

    public function query(): rawQuery
    {
        // TODO: Implement query() method.
    }

    public function table(): string
    {
        // TODO: Implement table() method.
    }
}