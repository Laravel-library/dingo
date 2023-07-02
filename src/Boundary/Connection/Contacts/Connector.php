<?php

namespace Dingo\Boundary\Connection\Contacts;

interface Connector
{

    public function client(): mixed;

    public function connection(): string;

    public static function customConnection(string $name): void;
}