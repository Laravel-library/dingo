<?php

namespace Dingo\Support\Builder\Contacts;

interface Query
{
    public function toSql(): string;
}