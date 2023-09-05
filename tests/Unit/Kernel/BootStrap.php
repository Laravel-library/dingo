<?php

namespace Tests\Unit\Kernel;

use Elephant\FoundationServiceProvider;
use Illuminate\Container\Container;

final readonly class BootStrap
{

    public static function boot(): void
    {
        self::makeServiceProvider()->register();
    }

    protected static function makeServiceProvider(): FoundationServiceProvider
    {
        return new FoundationServiceProvider(self::app());
    }

    public static function app():Container
    {
        return Container::getInstance();
    }
}