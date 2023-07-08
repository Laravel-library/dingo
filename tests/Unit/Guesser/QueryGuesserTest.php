<?php

namespace Tests\Unit\Guesser;

use Dingo\Support\Guesser\Contacts\Guessable;
use Dingo\Support\Guesser\QueryGuesser;
use PHPUnit\Framework\TestCase;

class QueryGuesserTest extends TestCase
{
    public function test_example(): void
    {
        $guesser = $this->getGuesser();

        $model = $guesser->guess('TestService')->getResolved();

        $this->assertIsString($model);
    }

    protected function getGuesser(): Guessable
    {
        return new QueryGuesser();
    }
}