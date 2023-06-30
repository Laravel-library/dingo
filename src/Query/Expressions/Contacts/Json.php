<?php

namespace Dingo\Query\Expressions\Contacts;

interface Json extends Queryable
{
    public function toArray(Queryable|string|array $value): self;

    public function toJson(Queryable|string|array $value): self;
}