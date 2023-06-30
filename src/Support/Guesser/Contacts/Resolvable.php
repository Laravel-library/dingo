<?php

namespace Dingo\Support\Guesser\Contacts;

interface Resolvable
{
    public function resolve(string $name): self;

    public function getResolved(): string;
}