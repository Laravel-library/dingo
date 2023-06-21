<?php

namespace Dingo\Services\Contacts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface Creator
{
    public function createOrUpdate(array $attributes): Builder|Model;
}