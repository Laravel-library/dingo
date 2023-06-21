<?php

namespace Dingo\Repositories;

use Dingo\Support\Builder\Contacts\Aliasable;
use Dingo\Support\Builder\Contacts\CaseWhenable;
use Dingo\Support\Builder\Contacts\Queryable;
use Dingo\Support\Guesser\Contacts\Factory;
use Dingo\Support\Guesser\Contacts\Guesser;

readonly class Repository
{
    protected Queryable|Aliasable $queryable;

    protected CaseWhenable|Aliasable $caseWhen;

    protected Factory $factory;

    protected Guesser $guesser;

    public function __construct(
        Queryable|Aliasable    $queryable,
        CaseWhenable|Aliasable $caseWhen,
        Factory                $factory,
        Guesser                $guesser
    )
    {
        $this->queryable = $queryable;

        $this->caseWhen = $caseWhen;

        $this->factory = $factory;

        $this->guesser = $guesser;
    }
}