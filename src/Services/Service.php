<?php

namespace Dingo\Services;

use Dingo\Boundary\Factory;
use Dingo\Services\Contacts\Creator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

readonly class Service implements Creator
{
    protected Factory $app;

    public function __construct(Factory $factory)
    {
        $this->app = $factory;
    }

    final public function createOrUpdate(array $attributes, string $by = 'id'): Builder|Model
    {

    }
}