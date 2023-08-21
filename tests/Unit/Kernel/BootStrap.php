<?php

namespace Tests\Unit\Kernel;

use Elephant\ElephantServiceProvider;
use Illuminate\Container\Container;

final readonly class BootStrap
{

    public static function boot(): void
    {
        self::makeServiceProvider()->register();
    }

    protected static function makeServiceProvider(): ElephantServiceProvider
    {
        return new ElephantServiceProvider(self::app());
    }

    public static function app():Container
    {
        return Container::getInstance();
    }
}