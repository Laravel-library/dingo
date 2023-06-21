<?php

namespace Dingo\Caches\Contacts;

interface Formatter
{
    public function slug(): string;
}