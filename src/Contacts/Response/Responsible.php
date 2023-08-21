<?php

namespace Elephant\Contacts\Response;

use Illuminate\Http\JsonResponse;

interface Responsible
{
    public function render(string|array $data, int $code): JsonResponse;
}