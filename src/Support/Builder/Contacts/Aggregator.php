<?php

namespace Dingo\Support\Builder\Contacts;

interface Aggregator extends Query
{
    public function count(Query|string $expression): self;

    public function sum(Query|string $expression): self;
}