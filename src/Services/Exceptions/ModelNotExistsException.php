<?php

namespace Dingo\Services\Exceptions;

use RuntimeException;

class ModelNotExistsException extends RuntimeException
{
    public static function modelNotExistsError(): never
    {
        throw new self('Model not exists.');
    }
}