<?php

namespace Tests\Unit\Guesser;

use Elephant\Support\Guesser\QueryGuesser;
use Guessable;
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