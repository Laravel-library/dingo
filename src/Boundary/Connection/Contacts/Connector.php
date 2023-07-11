<?php

namespace Dingo\Boundary\Connection\Contacts;

interface Connector
{

    public function client(): mixed;

    public function connection(): string;

    public function defaultConnection(): string;

    public function withConnection(string $name): void;
}