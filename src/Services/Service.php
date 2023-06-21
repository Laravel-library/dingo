<?php

namespace Dingo\Services;

use Dingo\Services\Contacts\Creator;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

readonly class Service implements Creator
{
    protected Container $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function createOrUpdate(array $attributes, string $by = 'id'): Builder|Model
    {

    }
}