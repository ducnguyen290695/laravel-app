<?php

namespace App\Factories;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class ErrorFactory
{
    public static function create(Throwable $exception): array
    {
        $apiError = [
            'message' => $exception->getMessage() ?: 'Internal server error',
            'status' => 500,
        ];

        if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
            $apiError = [
                'message' => $exception->getMessage() ?: 'Resource Not Found',
                'status' => 404,
            ];
        } elseif ($exception instanceof MethodNotAllowedHttpException) {
            $apiError = [
                'message' => $exception->getMessage() ?: 'Method Not Allowed',
                'status' => 405,
            ];
        } elseif ($exception instanceof AuthenticationException) {
            $apiError = [
                'message' => $exception->getMessage() ?: 'Unauthorized',
                'status' => 401,
            ];
        } elseif ($exception instanceof AccessDeniedHttpException) {
            $apiError = [
                'message' => $exception->getMessage() ?: 'Forbidden',
                'status' => 403,
            ];
        } elseif ($exception instanceof ValidationException) {
            $apiError = [
                'message' => $exception->getMessage() ?: 'Validation Failed',
                'status' => 422,
                'errors' => $exception->errors(),
            ];
        } elseif ($exception instanceof HttpException && $exception->getStatusCode() === 400) {
            $apiError = [
                'message' => $exception->getMessage() ?: 'Bad Request',
                'status' => 400,
            ];
        }

        return $apiError;
    }
}
