<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

/**
 * Handles API exception rendering and logging.
 */
class ExceptionHandler
{
    /**
     * Exception configuration: maps exception types to status codes and default messages.
     *
     * @var array<string, array{status: int, message: string}>
     */
    private array $exceptionMap = [
        ValidationException::class => [
            'status' => 422,
            'message' => 'Validation failed',
        ],
        AccessDeniedHttpException::class => [
            'status' => 403,
            'message' => 'Unauthorized action.',
        ],
        NotFoundHttpException::class => [
            'status' => 404,
            'message' => 'Resource not found.',
        ],
        HttpException::class => [
            'status' => 400, // Only for 400; others handled dynamically
            'message' => 'Bad request.',
        ],
    ];

    /**
     * Default response structure.
     *
     * @var array{message: string, errors: array}
     */
    private array $defaultResponse = [
        'message' => 'An unexpected error occurred.',
        'errors' => [],
    ];

    /**
     * Default status code for unhandled exceptions.
     */
    private const DEFAULT_STATUS = 500;

    public function render(Throwable $e, Request $request): JsonResponse | null
    {
        if (!$request->is('api/*')) {
            return null; 
        }

        [$response, $statusCode] = $this->buildResponse($e);

        return response()->json($response, $statusCode);
    }

    /**
     * Builds the response array and status code based on the exception.
     *
     * @param Throwable $e
     * @return array{array{message: string, errors: array}, int}
     */
    private function buildResponse(Throwable $e): array
    {
        $response = $this->defaultResponse;
        $statusCode = self::DEFAULT_STATUS;

        // Handle ValidationException
        if ($e instanceof ValidationException) {
            $response['message'] = $this->exceptionMap[ValidationException::class]['message'];
            $response['errors'] = $e->errors();
            $statusCode = $e->status; // 422
        }
        // Handle AuthorizationException (wrapped in AccessDeniedHttpException)
        elseif ($e instanceof AccessDeniedHttpException && $e->getPrevious() instanceof AuthorizationException) {
            $response['message'] = $e->getMessage() ?: $this->exceptionMap[AccessDeniedHttpException::class]['message'];
            $statusCode = $this->exceptionMap[AccessDeniedHttpException::class]['status']; // 403
        }
        // Handle NotFoundHttpException
        elseif ($e instanceof NotFoundHttpException) {
            $response['message'] = $e->getMessage() ?: $this->exceptionMap[NotFoundHttpException::class]['message'];
            $statusCode = $this->exceptionMap[NotFoundHttpException::class]['status']; // 404
        }
        // Handle HttpException (400)
        elseif ($e instanceof HttpException && $e->getStatusCode() === 400) {
            $response['message'] = $e->getMessage() ?: $this->exceptionMap[HttpException::class]['message'];
            $statusCode = $e->getStatusCode(); // 400
        }
        // Handle uncaught exceptions
        else {
            $response['message'] = $e->getMessage() ?: $this->defaultResponse['message'];
            $this->logError($e);
        }

        return [$response, $statusCode];
    }

    /**
     * Logs unexpected errors with context.
     *
     * @param Throwable $e
     * @return void
     */
    private function logError(Throwable $e): void
    {
        Log::error('Unexpected error: ' . $e->getMessage(), [
            'exception' => get_class($e),
            'trace' => $e->getTraceAsString(),
        ]);
    }
}
