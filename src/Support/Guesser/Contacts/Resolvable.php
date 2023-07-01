<?php

namespace Dingo\Support\Guesser\Contacts;

interface Resolvable
{
    public function guess(string $name): self;

    public function getResolved(): string;
}