<?php

namespace Dingo\Services\Contacts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface DataAccess
{
    public function createOrUpdate(array $attributes): Builder|Model;

    public function delete(mixed $value): int;

    public function deleteMany(array|\Closure $values): int;
}