<?php

namespace Dingo\Support\Http\Contacts;

use Illuminate\Http\JsonResponse;

interface Responder
{
    public function render(string|array $data, int $code): JsonResponse;
}