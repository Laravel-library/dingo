<?php

namespace Elephant\Facades;

use Elephant\Contacts\Response\Responsible;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static JsonResponse render(array|string $data, int $code = 200)
 */
class HttpResponder extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Responsible::class;
    }
}