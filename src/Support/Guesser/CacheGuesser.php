<?php

namespace Dingo\Support\Guesser;

final class CacheGuesser extends Guesser
{

    public function getResolved(): string
    {
        return 'cacheable:' . strtolower($this->class);
    }

    protected function hasSuffix(string $name): bool
    {
        return str_ends_with($name, $this->suffix());
    }

    protected function replaceSuffix(string $clazz): string
    {
        return substr($clazz, 0, -strlen($this->suffix()));
    }

    public function suffix(): string
    {
        return 'Cache';
    }
}