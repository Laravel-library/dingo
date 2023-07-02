<?php

namespace Tests\Unit\Kernel\Repository;

use Dingo\Query\Contacts\Queryable;
use Dingo\Repositories\Repository;

readonly class ExampleRepository extends Repository
{
    public function getQuery():Queryable
    {
        return $this->queryable;
    }
}