<?php

namespace Elephant\Contacts\Repository;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface Repositories
{
    public function createOrUpdate(array $values): Builder|Model;

    public function jsonUpdate(mixed $attributes, mixed $id): int;

    public function delete(mixed $value): int;
}