<?php

namespace Elephant\Repository;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait DataAccessTrait
{

    public function createOrUpdate(array $attributes, string $by = 'id'): Builder|Model
    {
        if ($byValue = $attributes[$by] ?? null) {

            if ($by === 'id') {
                unset($attributes[$by]);
            }

            return $this->builder()->updateOrCreate([$by => $byValue], $attributes);
        }

        return $this->builder()->create($attributes);
    }

    public function delete(mixed $value, string $by = 'id'): int
    {
        return $this->builder()->where($by, $value)->delete();
    }
}