<?php

namespace Dingo\Boundary\Contacts;

interface Factory
{
    public function app(string $class): mixed;
}