<?php

namespace Dingo\Query\Contacts;

use Illuminate\Database\Eloquent\Model;

interface DataAccess
{
    public function table(): string;

    public function model(): Model;
}