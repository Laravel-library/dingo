<?php

namespace Dingo\Repositories;

use Dingo\Query\Contacts\Queryable;

abstract readonly class Repository
{
    protected Queryable $queryable;

    public function __construct(Queryable $queryable)
    {
        $this->queryable = $queryable;

        $this->queryable->binding(get_class($this));
    }
}