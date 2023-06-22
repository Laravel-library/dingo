<?php

namespace Dingo\Support\Builder;

use Dingo\Support\Builder\Contacts\Queryable;

class Aggregator implements Contacts\Aggregator
{

    public function count(string|Queryable $expression): string
    {
        // TODO: Implement count() method.
    }

    public function sum(string|Queryable $expression): string
    {
        // TODO: Implement sum() method.
    }
}