<?php

namespace Dingo\Boundary\Connection\Contacts;

interface Connector
{

    public function connection(): string;

    public function client(): mixed;
}