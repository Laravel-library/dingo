<?php

namespace Dingo\Support\Builder\Contacts;

interface JsonConverter extends Queryable
{
    public function convert(Queryable|string|array $value): string;
}