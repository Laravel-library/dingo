<?php

namespace Dingo\Support\Http;

use Dingo\Support\Http\Contacts\Responder;
use Illuminate\Http\JsonResponse;
use JetBrains\PhpStorm\ArrayShape;

readonly class Response implements Responder
{

    public function render(array|string $data, int $code): JsonResponse
    {
        $response = $this->prepareResponse($code);

        $extra = match (true) {
            is_string($data) => ['message' => $data],
            default          => ['data' => $data],
        };

        $response = [...$response, ...$extra];

        return new JsonResponse($response);
    }

    #[ArrayShape(['message' => 'string|null', 'code' => 'integer'])]
    private function prepareResponse(int $code): array
    {
        return ['message' => null, 'code' => $code];
    }
}