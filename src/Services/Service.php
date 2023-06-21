<?php

namespace Dingo\Services;

use Dingo\Services\Contacts\Creator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

readonly class Service implements Creator
{

    public function createOrUpdate(array $attributes): Builder|Model
    {
        // TODO: Implement createOrUpdate() method.
    }
}