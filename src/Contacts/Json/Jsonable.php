<?php

namespace Elephant\Contacts\Json;

interface Jsonable
{
    public function encoder(array $attributes): mixed;
}