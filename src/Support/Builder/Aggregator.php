<?php

namespace Dingo\Support\Builder;

use Dingo\Support\Builder\Contacts\Aliasable;
use Dingo\Support\Builder\Contacts\CaseWhenable;
use Dingo\Support\Builder\Contacts\Queryable;

class Aggregator implements Queryable,Aliasable
{

    public function alias(string $alias): Aliasable
    {
        // TODO: Implement alias() method.
    }

    public function count(string|CaseWhenable $expression): string
    {
        // TODO: Implement count() method.
    }

    public function sum(string|CaseWhenable $expression): string
    {
        // TODO: Implement sum() method.
    }

    public function jsonArray(array|string $expression): string
    {
        // TODO: Implement jsonArray() method.
    }

    public function jsonObject(array|string $expression): string
    {
        // TODO: Implement jsonObject() method.
    }
}