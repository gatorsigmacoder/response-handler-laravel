<?php

namespace KipasAngin\ResponseHandler\Tests\Unit;

use KipasAngin\ResponseHandler\Enums\HttpStatus;
use KipasAngin\ResponseHandler\ResponseHandler;
use KipasAngin\ResponseHandler\Tests\TestCase;

class ResponseHandlerTest extends TestCase
{
    public function test_success_response_structure(): void
    {
        $jsonResponse = ResponseHandler::success(['id' => 1]);
        $response = $this->TestResponse($jsonResponse);

        $response->assertOk();
        $response->assertJsonStructure([
            'status_code',
            'message',
            'data' => ['id']
        ]);
    }

    // public function test_error_response(): void
    // {
    //     $response = ResponseHandler::error(
    //         ['email' => 'Invalid email'],
    //         'Validation failed',
    //         HttpStatus::BAD_REQUEST->value
    //     );

    //     $response->assertStatus(400);
    //     $response->assertJsonFragment([
    //         'message' => 'Validation failed',
    //         'errors' => ['email' => 'Invalid email']
    //     ]);
    // }

    // public function test_response_with_metadata(): void
    // {
    //     $response = ResponseHandler::success(
    //         ['user' => 'test'],
    //         ['page' => 1],
    //         'Paginated results',
    //         HttpStatus::OK->value
    //     );

    //     $response->assertJsonStructure([
    //         'data',
    //         'meta_data' => ['page']
    //     ]);
    // }
}