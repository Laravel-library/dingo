<?php

namespace Dingo\Support\Guesser\Contacts;

use Dingo\Support\Guesser\Guesser;

interface Resolvable
{
    public function resolve(string $name): Guesser;
}