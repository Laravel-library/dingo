<?php

namespace Dingo\Repositories;

use Dingo\Guesser\Contacts\Guesser;
use Dingo\Support\Builder\Contacts\Aggregator;
use Dingo\Support\Builder\Contacts\Aliasable;
use Dingo\Support\Builder\Contacts\CaseProcessor;
use Dingo\Support\Builder\Contacts\JsonConverter;

readonly class Repository
{
    protected Aggregator|Aliasable $aggregator;

    protected CaseProcessor|Aliasable $caseProcessor;

    protected JsonConverter|Aliasable $jsonConverter;

    protected Guesser $guesser;

    public function __construct(Aggregator $aggregator, CaseProcessor $processor, JsonConverter $converter, Guesser $guesser)
    {
        $this->aggregator = $aggregator;

        $this->caseProcessor = $processor;

        $this->jsonConverter = $converter;

        $this->guesser = $guesser;
    }

    public function test()
    {

    }
}