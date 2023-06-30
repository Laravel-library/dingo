<?php

namespace Test\Unit\Guesser;

use Dingo\Guesser\CacheGuesser;
use Dingo\Guesser\Contacts\Resolvable;
use PHPUnit\Framework\TestCase;

class CacheGuesserTest extends TestCase
{
    public function test_example():void
    {
        $cacheGuesser = $this->getGuesser();

      $key = $cacheGuesser->resolve('\\TestCache')->getResolved();

      $this->assertIsString($key);
    }

    protected function getGuesser():Resolvable
    {
        return  new CacheGuesser();
    }
}