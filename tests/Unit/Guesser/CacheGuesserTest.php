<?php

namespace Tests\Unit\Guesser;

use Elephant\Support\Guesser\CacheGuesser;
use Guessable;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class CacheGuesserTest extends TestCase
{
    #[DataProvider('getGuesser')]
    public function testResolveNotNull(Guessable $resolvable): void
    {
        $key = $resolvable->guess('\\TestCache')->getResolved();

        $this->assertIsString($key);
    }

    #[DataProvider('getGuesser')]
    public function testResolvedEqualTest(Guessable $resolvable): void
    {
        $name = $resolvable->guess('\\TestCache')->getResolved();

        $this->assertEquals('cache:test', $name, $name);
    }

    public static function getGuesser(): array
    {
        return [
            [new CacheGuesser()],
        ];
    }
}