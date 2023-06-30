<?php

namespace Dingo\Guesser\Contacts;

use Dingo\Guesser\Guesser;

interface Resolvable
{
    public function resolve(string $name): Guesser;
}