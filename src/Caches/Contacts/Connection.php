<?php

namespace Dingo\Caches\Contacts;

interface Connection
{
    public function client(): mixed;
}