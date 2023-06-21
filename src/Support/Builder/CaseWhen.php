<?php

namespace Dingo\Support\Builder;

use Dingo\Support\Builder\Contacts\Aliasable;
use Dingo\Support\Builder\Contacts\CaseWhenable;

class CaseWhen implements CaseWhenable, Aliasable
{

    public function case(): CaseWhenable
    {
        // TODO: Implement case() method.
    }

    public function when(): CaseWhenable
    {
        // TODO: Implement when() method.
    }

    public function then(): CaseWhenable
    {
        // TODO: Implement then() method.
    }

    public function else(): CaseWhenable
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