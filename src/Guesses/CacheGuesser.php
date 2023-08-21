<?php

declare(strict_types=1);

namespace Elephant\Guesses;

final class CacheGuesser extends Guesser
{

    public function guess(): string
    {
        return 'cache:' . strtolower($this->class);
    }

    protected function hasSuffix(string $name): bool
    {
        return str_ends_with($name, $this->suffix());
    }

    protected function replaceSuffix(string $clazz): string
    {
        return substr($clazz, 0, -strlen($this->suffix()));
    }

    protected function bind(string $class): void
    {
        $this->class = $class;
    }

    public function suffix(): string
    {
        return 'Cache';
    }
}