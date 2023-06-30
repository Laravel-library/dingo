<?php

namespace Dingo\Support\Guesser;

use Dingo\Support\Guesser\Contacts\Resolvable;

abstract class Guesser implements Resolvable
{
    protected ?string $class = null;

    abstract public function getResolved(): string;

    public function resolve(string $name): self
    {
        if ($this->hasClass()) {
            return $this;
        }

        $this->bindingConcrete($name);

        return $this;
    }

    private function hasClass(): bool
    {
        return !is_null($this->class);
    }

    private function bindingConcrete(string $name): void
    {
        $clazz = substr($name, strripos($name, '\\') + 1);

        if ($this->hasSuffix($clazz)) {
            $clazz = $this->replaceSuffix($clazz);
        }

        $this->class = $clazz;
    }

    abstract protected function hasSuffix(string $name): bool;

    abstract protected function replaceSuffix(string $clazz): string;

    abstract protected function suffix(): string|array;
}