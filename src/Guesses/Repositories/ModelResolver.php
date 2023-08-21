<?php

namespace Elephant\Guesses\Repositories;

use Elephant\Contacts\Guesses\Resolvable;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Container\Container;
use Elephant\Contacts\Guesses\Guessable;

class ModelResolver implements Resolvable
{

    protected ?string $class = null;

    protected ?Model $model = null;

    protected readonly Guessable $guessable;

    protected readonly Container $app;

    public function __construct(Guessable $guessable, Container $app)
    {
        $this->guessable = $guessable;

        $this->app = $app;
    }

    public function binding(string $class): self
    {
        $this->class = $class;

        return $this;
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
        $class = $this->guessable->needs($this->class)->guess();

        try {
            $this->model = $this->app->make($class);
        } catch (BindingResolutionException $e) {
            throw new \Elephant\Exceptions\BindingResolutionException($e->getMessage(), 500);
        }

        return $this->model;
    }
}