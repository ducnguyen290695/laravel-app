<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Factories\ErrorFactory;

class ExceptionHandler
{
    public function render(\Throwable $exception, Request $request): JsonResponse | null
    {
        if (!$request->is('api/*')) {
            return null;
        }

        $apiError =   ErrorFactory::create($exception);

        return response()->json($apiError, $apiError['status']);
    }
}
