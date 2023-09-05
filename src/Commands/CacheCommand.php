<?php

namespace Elephant\Commands;

use Illuminate\Console\GeneratorCommand;

class CacheCommand extends GeneratorCommand
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Cache class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/cache.stub.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Caches';
    }
}