<?php

namespace Dingo\Support\Builder\Contacts;

interface JsonConverter extends Queryable
{
    public function toArray(Queryable|string|array $value): self;

    public function toJson(Queryable|string|array $value): self;
}