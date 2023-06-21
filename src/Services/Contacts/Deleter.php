<?php

namespace Dingo\Services\Contacts;

interface Deleter
{
    public function delete(mixed $value): int;
}