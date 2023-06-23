<?php

namespace Dingo\Support\Builder\Contacts;

interface Queryable
{
    public function toSql(): string;
}