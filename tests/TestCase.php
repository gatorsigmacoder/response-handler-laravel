<?php

namespace KipasAngin\ResponseHandler\Tests;

use Illuminate\Testing\TestResponse;
use KipasAngin\ResponseHandler\ResponseHandlerServiceProvider;
use Orchestra\Testbench\Concerns\CreatesApplication;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createApplication();
    }

    protected function getPackageProviders($app)
    {
        return [
            ResponseHandlerServiceProvider::class
        ];
    }

    /**
     * Convert JsonResponse to TestResponse
     */
    protected function TestResponse($jsonResponse)
    {
        return TestResponse::fromBaseResponse($jsonResponse);
    }
}