<?php

declare(strict_types=1);

namespace Elephant\Guesses;

use Elephant\Contacts\Guesses\Guessable;

abstract class Guesser implements Guessable
{
    protected ?string $class = null;

    abstract public function guess(): string;

    public function needs(string $class): self
    {
        if ($this->hasClass()) {
            return $this;
        }

        $this->classNameBinding($class);

        return $this;
    }

    private function hasClass(): bool
    {
        return !is_null($this->class);
    }

    private function classNameBinding(string $name): void
    {
        $clazz = substr($name, strripos($name, '\\') + 1);

        if ($this->hasSuffix($clazz)) {
            $clazz = $this->replaceSuffix($clazz);
        }

        $this->bind($clazz);
    }

    abstract protected function hasSuffix(string $name): bool;

    abstract protected function replaceSuffix(string $clazz): string;

    abstract protected function bind(string $class): void;

    abstract protected function suffix(): string|array;
}