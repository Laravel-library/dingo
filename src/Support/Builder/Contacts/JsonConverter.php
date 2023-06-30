<?php

namespace Dingo\Support\Builder\Contacts;

interface JsonConverter extends Query
{
    public function toArray(Query|string|array $value): self;

    public function toJson(Query|string|array $value): self;
}