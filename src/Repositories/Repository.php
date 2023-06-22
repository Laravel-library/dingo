<?php

namespace Dingo\Repositories;

use Dingo\Support\Builder\Contacts\Aggregator;
use Dingo\Support\Builder\Contacts\Aliasable;
use Dingo\Support\Builder\Contacts\CaseProcessor;
use Dingo\Support\Builder\Contacts\JsonConverter;
use Dingo\Support\Builder\Contacts\Queryable;
use Dingo\Support\Guesser\Contacts\Guesser;

readonly class Repository
{
    protected Queryable|Aggregator|Aliasable $aggregator;

    protected Queryable|CaseProcessor|Aliasable $caseProcessor;

    protected Queryable|JsonConverter|Aliasable $jsonConverter;

    protected Guesser $guesser;

    public function __construct(Queryable $aggregator, Queryable $processor, Queryable $converter, Guesser $guesser)
    {
        $this->aggregator = $aggregator;

        $this->caseProcessor = $processor;

        $this->jsonConverter = $converter;

        $this->guesser = $guesser;
    }
}