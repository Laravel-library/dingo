<?php

namespace Test\Unit\Guesser;

use Dingo\Support\Guesser\CacheGuesser;
use Dingo\Support\Guesser\Contacts\Resolvable;
use PHPUnit\Framework\TestCase;

class CacheGuesserTest extends TestCase
{
    public function test_example():void
    {
        $cacheGuesser = $this->getGuesser();

      $key = $cacheGuesser->guess('\\TestCache')->getResolved();

      $this->assertIsString($key);
    }

    protected function getGuesser():Resolvable
    {
        return  new CacheGuesser();
    }
}