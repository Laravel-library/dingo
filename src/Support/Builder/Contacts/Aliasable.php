<?php

namespace Dingo\Support\Builder\Contacts;

interface Aliasable
{
    public function alias(string $alias): self;
}