<?php

namespace Dingo\Query;

use Dingo\Boundary\Factory\Contacts\Factory;
use Dingo\Query\Contacts\Resolvable;
use Dingo\Support\Guesser\Contacts\Guessable;
use Illuminate\Database\Eloquent\Model;

final class Resolver implements Resolvable
{

    protected ?string $class = null;

    protected ?Model $model = null;

    protected readonly Guessable $guessable;

    protected readonly Factory $factory;

    public function __construct(Guessable $resolvable, Factory $factory)
    {
        $this->guessable = $resolvable;

        $this->factory = $factory;
    }

    public function binding(string $class): void
    {
        $this->class = $class;
    }

    public function getConcrete(): Model
    {
        return $this->hasModel() ? $this->model : $this->resolve();
    }

    protected function hasModel(): bool
    {
        return !is_null($this->model);
    }

    protected function resolve(): Model
    {
        $class = $this->guessable->guess($this->class)->getResolved();

        $this->model = $this->factory->app($class);

        return $this->model;
    }
}