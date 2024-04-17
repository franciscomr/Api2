<?php

namespace App\Http\Responses;

class JsonApiExceptionResponseObject
{
    protected $message;
    protected $detail;
    protected $pointer;
    protected $statusCode;

    public function __construct(string $message = 'Server Error', string $detail = 'Internal Server Error', string $pointer = 'data/', int $statusCode = 500)
    {
        $this->message = $message;
        $this->detail = $detail;
        $this->pointer = $pointer;
        $this->statusCode = $statusCode;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    public function getDetail(): string
    {
        return $this->detail;
    }

    public function setDetail(?string $detail): void
    {
        $this->detail = $detail;
    }

    public function getPointer(): string
    {
        return $this->pointer;
    }


    public function setPointer(?string $pointer): void
    {
        $this->pointer = $pointer;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(?int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }
}
