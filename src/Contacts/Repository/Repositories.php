<?php

namespace Elephant\Contacts\Repository;


use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface Repositories
{
    public function createOrUpdate(array $values): Builder|Model;

    public function updateJson(array|string $values): void;

    public function delete(mixed $value): int;
}