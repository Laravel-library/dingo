<?php

namespace Elephant\Contacts;

interface Query
{
    public function toSql(): string;
}