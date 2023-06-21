<?php

namespace Dingo\Boundary;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;

readonly class Factory implements Contacts\Factory
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function app(string $class, array $parameters = []): mixed
    {
        try {
            $concrete = $this->container->make($class);
        } catch (BindingResolutionException $e) {
            throw new Exceptions\BindingResolutionException($e->getMessage(), 500);
        }

        return $concrete;
    }
}