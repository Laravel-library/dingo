<?php

namespace Test\Unit\Guesser;

use Dingo\Guesser\Contacts\Resolvable;
use Dingo\Guesser\QueryGuesser;
use PHPUnit\Framework\TestCase;

class QueryGuesserTest extends TestCase
{
    public function test_example(): void
    {
        $guesser = $this->getGuesser();

        $result = $guesser->resolve('TestService')->getResolved();

        $this->assertIsString($result);
    }

    protected function getGuesser(): Resolvable
    {
        return new QueryGuesser();
    }
}