<?php

namespace Dingo\Support\Builder\Contacts;

interface Queryable
{
    public function count(CaseWhenable|string $expression): string;

    public function sum(CaseWhenable|string $expression): string;

    public function jsonArray(array|string $expression): string;

    public function jsonObject(array|string $expression): string;
}