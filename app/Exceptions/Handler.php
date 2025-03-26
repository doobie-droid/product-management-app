<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request   $request
     * @param \Throwable $e
     * @return JsonResponse
     */
    public function render($request, \Throwable $e)
    {

        if ($e instanceof ModelNotFoundException) {
            $errorMessage = sprintf("%s not found", $e->getModel());
            return $this->handleResponse($errorMessage, Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof HttpException) {
            return $this->handleResponse($e->getMessage(), $e->getStatusCode());
        }

        return parent::render($request, $e);
    }

    private function handleResponse($message = 'There was an error', $code = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return new JsonResponse([
            'message' => $message,
        ], $code);
    }
}
