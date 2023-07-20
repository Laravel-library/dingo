<?php

namespace Dingo\Resolution\Contacts;

use Illuminate\Database\Eloquent\Model;

interface Resolvable
{
    public function binding(string $class): void;

    public function getConcrete(): Model;
}