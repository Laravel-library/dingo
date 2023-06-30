<?php

namespace Dingo\Caches\Contacts;

interface Cacheable
{
    public function generateKey(): string;
}