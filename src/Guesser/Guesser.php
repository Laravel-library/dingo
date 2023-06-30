<?php

namespace Dingo\Guesser;

use Dingo\Guesser\Contacts\Resolvable;

abstract class Guesser implements Resolvable
{
    protected ?string $class = null;

    abstract public function getResolved(): string;

    public function resolve(string $name): self
    {
        if (null !== $this->class) {
            return $this;
        }

        $clazz = substr($name, strripos($name, '\\') + 1);

        if ($this->hasSuffix($clazz)) {
            $clazz = $this->replaceSuffix($clazz);
        }

        $this->class = $clazz;

        return $this;
    }

    abstract protected function hasSuffix(string $name): bool;

    abstract protected function replaceSuffix(string $clazz): string;

    abstract protected function suffix(): string|array;
}