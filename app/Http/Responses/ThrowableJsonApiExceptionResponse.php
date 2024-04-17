<?php

namespace App\Http\Responses;

use Exception;
use Illuminate\Http\JsonResponse;
use Throwable;

class ThrowableJsonApiExceptionResponse extends Exception
{
    protected $responseObject;

    public function __construct(JsonApiExceptionResponseObject $responseObject, ?Throwable $previous = null)
    {
        $this->responseObject = $responseObject;
        parent::__construct($this->responseObject->getMessage(), $this->responseObject->getStatusCode(), $previous);
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'errors' => [
                [
                    'status' => $this->responseObject->getStatusCode(),
                    'title' => $this->responseObject->getMessage(),
                    'detail' => $this->responseObject->getDetail(),
                    'source' => [
                        'pointer' => $this->responseObject->getPointer(),
                    ]
                ]
            ]
        ]);
    }
}
