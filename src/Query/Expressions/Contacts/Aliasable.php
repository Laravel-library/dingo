<?php

namespace Dingo\Query\Expressions\Contacts;

interface Aliasable
{
    public function alias(string $name): Queryable|Aliasable;
}