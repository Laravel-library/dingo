<?php

namespace Dingo\Boundary\Factory;

use Dingo\Boundary\Factory;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;

readonly class Application implements Factory\Contacts\Factory
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
            throw new Factory\Exceptions\BindingResolutionException($e->getMessage(), 500);
        }

        return $concrete;
    }
}