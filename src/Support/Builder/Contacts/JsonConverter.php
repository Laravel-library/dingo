<?php

namespace Dingo\Support\Builder\Contacts;

interface JsonConverter
{
    public function convertArray(array|string $expression): string;

    public function convertObject(array|string $expression): string;
}