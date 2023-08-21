<?php

declare(strict_types=1);

namespace Elephant\Response;

use Elephant\Contacts\Response\Responsible;
use Illuminate\Http\JsonResponse;

final readonly class Responder implements Responsible
{

    public function render(array|string $data, int $code): JsonResponse
    {
        $response = ['message' => null, 'code' => $code];

        $response = array_merge($response, $this->prepareResponse($data));

        return new JsonResponse($response);
    }

    protected function prepareResponse(array|string $data): array
    {
        return match (true) {
            is_string($data) => ['message' => $data],
            default          => ['data' => $data],
        };
    }
}