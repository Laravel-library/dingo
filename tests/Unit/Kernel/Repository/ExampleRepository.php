<?php

namespace Tests\Unit\Kernel\Repository;

use Elephant\Query\Contacts\Queryable;
use Elephant\Repository\Repository;

readonly class ExampleRepository extends Repository
{
    public function getQuery():Queryable
    {
        return $this->queryable;
    }
}