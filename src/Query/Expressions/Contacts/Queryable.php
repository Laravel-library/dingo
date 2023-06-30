<?php

namespace Dingo\Query\Expressions\Contacts;

interface Queryable
{
    public function toSql(): string;
}