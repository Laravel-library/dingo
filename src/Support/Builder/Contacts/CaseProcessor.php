<?php

namespace Dingo\Support\Builder\Contacts;

interface CaseProcessor extends Query
{
    public function case(Query|string $value): self;

    public function when(Query|string $value): self;

    public function then(Query|string $value): self;

    public function else(Query|string $value): self;

    public function end(): self;
}