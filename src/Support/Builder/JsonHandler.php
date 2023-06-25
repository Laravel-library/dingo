<?php

namespace Dingo\Support\Builder;

use Dingo\Support\Builder\Contacts\JsonConverter;
use Dingo\Support\Builder\Contacts\Queryable;

class JsonHandler implements Contacts\JsonConverter
{

    public function toArray(array|string|Queryable $value): Contacts\JsonConverter
    {
        // TODO: Implement toArray() method.
    }

    public function toJson(array|string|Queryable $value): Contacts\JsonConverter
    {
        // TODO: Implement toJson() method.
    }

    public function toSql(): string
    {
        // TODO: Implement toSql() method.
    }
}