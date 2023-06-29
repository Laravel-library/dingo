<?php

namespace Test\Futures;

use Dingo\Support\Http\Contacts\Responder;
use Dingo\Support\Http\Response;
use PHPUnit\Framework\TestCase;

class ResponderTest extends TestCase
{
    public function test_response_is_object(): void
    {
        $responder = $this->getResponder();

        $response = $responder->render('testing', 200);

        $this->assertIsObject($response->getData());
    }

    public function test_response_has_message_key(): void
    {
        $responder = $this->getResponder();

        $response = $responder->render(['user' => ['name' => 'jack',]], 200);

        $json = $response->original;

        $this->assertArrayHasKey('message',$json);
    }

    public function test_response_status_code():void
    {
        $responder = $this->getResponder();

        $response = $responder->render('change success',204);

        $this->assertEquals(204,$response->original['code']);
    }

    protected function getResponder(): Responder
    {
        return new Response();
    }
}