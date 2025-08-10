<?php

namespace KipasAngin\ResponseHandler;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use KipasAngin\ResponseHandler\Enums\HttpStatus;

class ResponseHandler {
    public static function success($data = null, $metaData = null, $message = 'Success', $status = HttpStatus::OK->value): JsonResponse {
        return self::createResponse($data, null, $metaData, $message, $status);
    }

    public static function error($errors = null, $message = 'Error', $status = HttpStatus::INTERNAL_SERVER_ERROR->value) {
        return self::createResponse(null, $errors, null, $message, $status);
    }

    private static function createResponse($data, $errors, $metaData, $message, $code): JsonResponse {
        $response = [
            'status_code' => $code,
            'message' => $message,
        ];

        if ($data) {
            $response['data'] = $data;
        }

        if ($metaData) {
            $response['meta_data'] = $metaData;
        }
        
        if ($errors) {
            $response['errors'] = $errors;
        }

        return Response::json($response, $code);
    }
}