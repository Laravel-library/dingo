<?php

namespace Elephant\Contacts\Guesses;

interface Resolvable
{
    public function binding(string $class): Resolvable;

    public function getConcrete(): mixed;
}