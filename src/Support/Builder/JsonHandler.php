<?php

namespace Dingo\Support\Builder;

use Dingo\Support\Builder\Contacts\JsonConverter;
use Dingo\Support\Builder\Contacts\Query;

class JsonHandler implements Contacts\JsonConverter
{

    public function toArray(array|string|Query $value): Contacts\JsonConverter
    {
        // TODO: Implement toArray() method.
    }

    public function toJson(array|string|Query $value): Contacts\JsonConverter
    {
        // TODO: Implement toJson() method.
    }

    public function toSql(): string
    {
        // TODO: Implement toSql() method.
    }
}