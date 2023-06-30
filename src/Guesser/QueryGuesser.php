<?php

namespace Dingo\Guesser;

final class QueryGuesser extends Guesser
{

    public function getResolved(): string
    {
        return $this->class;
    }

    protected function hasSuffix(string $name): bool
    {
        foreach ($this->suffix() as $suffix) {
            if (str_ends_with($name, $suffix)) {
                return true;
            }
        }

        return false;
    }

    protected function replaceSuffix(string $clazz): string
    {
        $clazzSuffix = array_filter($this->suffix(), fn(string $suffix) => str_contains($clazz, $suffix));

        $suffixName = current($clazzSuffix);

        return substr($clazz,0,-strlen($suffixName));
    }

    protected function suffix(): array
    {
        return ['Service', 'Repository'];
    }
}