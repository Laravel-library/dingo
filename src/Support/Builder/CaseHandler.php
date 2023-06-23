<?php

namespace Dingo\Support\Builder;

use Dingo\Support\Builder\Contacts\Aliasable;
use Dingo\Support\Builder\Contacts\CaseProcessor;
use Dingo\Support\Builder\Contacts\Formatter;
use Dingo\Support\Builder\Contacts\Queryable;

readonly class CaseHandler implements CaseProcessor, Aliasable
{
    protected Formatter $formatter;

    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    public function case(Queryable|string $value): CaseProcessor
    {
        // TODO: Implement case() method.
    }

    public function when(Queryable|string $value): CaseProcessor
    {
        // TODO: Implement when() method.
    }

    public function then(Queryable|string $value): CaseProcessor
    {
        // TODO: Implement then() method.
    }

    public function else(Queryable|string $value): CaseProcessor
    {
        // TODO: Implement else() method.
    }

    public function end(): CaseProcessor
    {
        // TODO: Implement end() method.
    }

    public function alias(string $name): Aliasable
    {
        // TODO: Implement alias() method.
    }

    public function toSql(): string
    {
        // TODO: Implement toSql() method.
    }
}