<?php

namespace Dingo\Support\Builder;

use Dingo\Support\Builder\Contacts\Aliasable;
use Dingo\Support\Builder\Contacts\CaseProcessor;

class CaseHandler implements CaseProcessor, Aliasable
{

    public function case(): CaseProcessor
    {
        // TODO: Implement case() method.
    }

    public function when(): CaseProcessor
    {
        // TODO: Implement when() method.
    }

    public function then(): CaseProcessor
    {
        // TODO: Implement then() method.
    }

    public function else(): CaseProcessor
    {
        // TODO: Implement else() method.
    }

    public function end(): string
    {
        // TODO: Implement end() method.
    }

    public function alias(string $alias): Aliasable
    {
        // TODO: Implement alias() method.
    }
}