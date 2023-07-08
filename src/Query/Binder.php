<?php

namespace Dingo\Query;

use Dingo\Boundary\Factory\Contacts\Factory;
use Dingo\Query\Contacts\Bindable;
use Dingo\Support\Guesser\Contacts\Guessable;
use Illuminate\Database\Eloquent\Model;

final class Binder implements Bindable
{
    protected ?Model $model = null;

    protected ?string $class = null;

    protected readonly Guessable $resolvable;

    public function __construct(Guessable $resolvable, Factory $factory)
    {
        $this->resolvable = $resolvable;

        $this->factory = $factory;
    }

     public function model(): Model
    {
        return $this->hasModel() ? $this->model : $this->resolveModel();
    }

    protected function hasModel(): bool
    {
        return !is_null($this->model);
    }

    protected function resolveModel(): Model
    {
        $class = $this->resolvable->guess(get_class($this->class))->getResolved();

        $this->model = $this->factory->app($class);

        return $this->model;
    }

    public function binding(string $class): void
    {
        $this->class = $class;
    }

    public function getConcrete(): string
    {

    }
}