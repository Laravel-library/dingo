<?php

namespace Dingo\Repositories;

use Dingo\Support\Builder\Contacts\Aliasable;
use Dingo\Support\Builder\Contacts\CaseProcessor;
use Dingo\Support\Builder\Contacts\Queryable;
use Dingo\Support\Guesser\Contacts\Guesser;

readonly class Repository
{
    protected Queryable|Aliasable $queryable;

    protected CaseProcessor|Aliasable $caseProcessor;

    protected Guesser $guesser;

    public function __construct(Queryable|Aliasable $queryable, CaseProcessor|Aliasable $processor, Guesser $guesser)
    {
        $this->queryable = $queryable;

        $this->caseProcessor = $processor;

        $this->guesser = $guesser;
    }
}