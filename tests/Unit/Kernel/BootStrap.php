<?php

namespace Tests\Unit\Kernel;

use Dingo\ServiceProvider;
use Illuminate\Container\Container;

final readonly class BootStrap
{

    public static function boot(): void
    {
        self::makeServiceProvider()->boot();
    }

    protected static function makeServiceProvider(): ServiceProvider
    {
        return new ServiceProvider(self::app());
    }

    public static function app():Container
    {
        return Container::getInstance();
    }
}