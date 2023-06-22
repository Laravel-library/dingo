<?php

namespace Dingo\Support\Builder\Contacts;

interface JsonConverter extends Queryable
{
    public function toArray(Queryable|string|array $value): string;

    public function toObject(Queryable|string|array $value): string;
}