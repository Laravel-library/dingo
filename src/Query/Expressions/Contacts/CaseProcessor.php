<?php

namespace Dingo\Query\Expressions\Contacts;

interface CaseProcessor extends Queryable
{
    public function case(Queryable|string $value): self;

    public function when(Queryable|string $value): self;

    public function then(Queryable|string $value): self;

    public function else(Queryable|string $value): self;

    public function end(): self;
}