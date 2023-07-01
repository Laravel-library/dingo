<?php

namespace Dingo\Boundary\Factory\Contacts;

interface Factory
{
    public function app(string $class): mixed;
}