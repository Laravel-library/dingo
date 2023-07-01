<?php

declare(strict_types=1);

namespace Dingo\Repositories;

use Dingo\Query\Contacts\Queryable;

readonly class Repository
{
    protected Queryable $queryable;

    public function __construct(Queryable $queryable)
    {
        $this->queryable = $queryable;

        $this->queryable->though(get_class($this));
    }

}