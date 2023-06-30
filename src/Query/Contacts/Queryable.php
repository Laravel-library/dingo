<?php

namespace Dingo\Query\Contacts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;

interface Queryable
{

    public function query(): rawQuery;

    public function builder(): Builder;
}