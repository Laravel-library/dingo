<?php

namespace Dingo\Support\Builder\Contacts;

interface Aggregator extends Queryable
{
    public function count(CaseProcessor|string $expression): string;

    public function sum(CaseProcessor|string $expression): string;
}