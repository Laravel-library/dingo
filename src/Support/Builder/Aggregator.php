<?php

namespace Dingo\Support\Builder;

use Dingo\Support\Builder\Contacts\Aliasable;
use Dingo\Support\Builder\Contacts\Formatter;
use Dingo\Support\Builder\Contacts\Queryable;

class Aggregator implements Contacts\Aggregator, Aliasable
{
    protected Formatter $formatter;

    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    public function count(string|Queryable $expression): string
    {
        return 'COUNT(' . $expression . ')';
    }

    public function sum(string|Queryable $expression): string
    {
        return 'SUM(' . $expression . ')';
    }

    public function alias(string $name): Aliasable|Contacts\Aggregator
    {
        // TODO: Implement alias() method.
    }
}