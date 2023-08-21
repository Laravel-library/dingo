<?php

namespace Elephant\Contacts\Guesses;

interface Guessable
{
    public function needs(string $class): self;

    public function guess(): string;
}