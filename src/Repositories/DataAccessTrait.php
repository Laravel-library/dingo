<?php

declare(strict_types=1);

namespace Elephant\Repositories;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait DataAccessTrait
{

    public function createOrUpdate(array $values, string $by = 'id'): Builder|Model
    {
        if ($byValue = $values[$by] ?? null) {

            if ($by === 'id') {
                unset($values[$by]);
            }

            return $this->builder()->updateOrCreate([$by => $byValue], $values);
        }

        return $this->builder()->create($values);
    }

    public function delete(mixed $value, string $by = 'id'): int
    {
        return $this->builder()->where($by, $value)->delete();
    }

    public function jsonUpdate(array|string $attributes, string|int $id): int
    {
        return $this->query()->where('id', $id)->update($this->resolve($attributes));
    }

    private function resolve(mixed $values): array
    {

    }
}