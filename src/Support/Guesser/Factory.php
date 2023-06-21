<?php

namespace Dingo\Support\Guesser;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Contracts\Database\Query\Builder as RawBuilder;

readonly class Factory implements Contacts\Factory
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @throws BindingResolutionException
     */
    public function app(string $class): EloquentBuilder|RawBuilder
    {
        return $this->container->make($class);
    }
}