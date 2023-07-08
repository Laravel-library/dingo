<?php

namespace Dingo\Support\Guesser\Contacts;

interface Guessable
{
    public function guess(string $name): self;

    public function getResolved(): string;
}