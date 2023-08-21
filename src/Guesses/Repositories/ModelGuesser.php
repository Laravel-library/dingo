<?php

namespace Elephant\Guesses\Repositories;

use Elephant\Guesses\Guesser;

final class ModelGuesser extends Guesser
{

    public function guess(): string
    {
        if (!class_exists($this->class)) {
            $this->class = AnonymousModel::class;
        }

        return $this->class;
    }

    protected function hasSuffix(string $name): bool
    {
        return !empty($this->findSuffix($name));
    }

    protected function replaceSuffix(string $clazz): string
    {
        $suffix = current($this->findSuffix($clazz));

        return substr($clazz, 0, -strlen($suffix));
    }

    private function findSuffix(string $clazz): array
    {
        return array_filter($this->suffix(), fn(string $suffix) => str_ends_with($clazz, $suffix));
    }

    protected function bind(string $class): void
    {
        $this->class = 'App\\Models\\' . $class;
    }

    protected function suffix(): array
    {
        return ['Service', 'Repository'];
    }
}