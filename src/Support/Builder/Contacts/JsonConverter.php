<?php

namespace Dingo\Support\Builder\Contacts;

interface JsonConverter
{
    public function convert(Queryable|string|array $value): string;
}