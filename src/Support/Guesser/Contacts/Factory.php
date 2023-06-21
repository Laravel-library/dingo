<?php

namespace Dingo\Support\Guesser\Contacts;


use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Contracts\Database\Query\Builder as RawBuilder;

interface Factory
{
    public function app(string $class): EloquentBuilder|RawBuilder;
}