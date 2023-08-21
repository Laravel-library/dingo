<?php

namespace Elephant\Contacts\Cache;

interface Cacheable
{
    public function generateKey(): string;
}