<?php

namespace Dingo\Caches\Contacts;

use Redis;

interface Connection
{
    public function client(): Redis;
}