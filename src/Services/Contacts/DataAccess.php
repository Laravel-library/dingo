<?php

namespace Dingo\Services\Contacts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface DataAccess
{
    public function createOrUpdate(array $attributes): Builder|Model;

    public function updateJson(array|string $attributes): void;

    public function delete(mixed $value): int;
}