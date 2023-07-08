<?php

namespace Dingo\Repositories;

use Dingo\Query\Contacts\Queryable;
use Dingo\Query\Contacts\Resolvable;

abstract readonly class Repository
{
    protected Queryable $queryable;

    public function __construct(Queryable $queryable, Resolvable $resolvable)
    {
        $this->queryable = $queryable;

        $resolvable->binding(get_class($this));
    }
}