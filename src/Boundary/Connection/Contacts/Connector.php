<?php

namespace Dingo\Boundary\Connection\Contacts;

interface Connector
{

    public static function customConnection(string $name): void;

    public function connection(): string;

    public function client(): mixed;
}