<?php

namespace Dingo\Query\Expressions\Contacts;

interface Aggregator extends Queryable
{
    public function count(Queryable|string $expression): self;

    public function sum(Queryable|string $expression): self;
}