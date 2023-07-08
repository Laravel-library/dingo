<?php

namespace Dingo\Query;

use Dingo\Query\Contacts\Resolvable;
use Dingo\Support\Guesser\Contacts\Guessable;

final class Resolver implements Resolvable
{

    protected ?string $class = null;

    protected ?string $model = null;

    protected readonly Guessable $guessable;

    public function __construct(Guessable $resolvable)
    {
        $this->guessable = $resolvable;
    }

    public function binding(string $class): void
    {
        $this->class = $class;
    }

    public function getConcrete(): string
    {
        return $this->hasModel() ? $this->model : $this->resolve();
    }

    protected function hasModel(): bool
    {
        return !is_null($this->model);
    }

    protected function resolve(): string
    {
        $this->model = $this->guessable->guess($this->class)->getResolved();

        return $this->model;
    }
}