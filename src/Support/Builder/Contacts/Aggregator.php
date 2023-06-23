<?php

namespace Dingo\Support\Builder\Contacts;

interface Aggregator extends Queryable
{
    public function count(Queryable|string $expression): self;

    public function sum(Queryable|string $expression): self;
}