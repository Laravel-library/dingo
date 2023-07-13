<?php

namespace Dingo\Repositories\Contacts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface Query
{
    public function latest(string $column): ?Model;
}