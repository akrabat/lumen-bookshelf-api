<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }


    private function getStatusCodeFromException(Exception $e)
    {
        if ($e instanceof ModelNotFoundException) {
            $fe = FlattenException::create($e, 404);
        } elseif ($e instanceof AuthorizationException) {
            $fe = FlattenException::create($e, 403);
        } else {
            $fe = FlattenException::create($e);
        }

        return $fe->getStatusCode();
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof HttpResponseException) {
            return $e->getResponse();
        } elseif ($e instanceof ValidationException && $e->getResponse()) {
            return $e->getResponse();
        }

        $statusCode = $this->getStatusCodeFromException($e);
        $error['error'] = Response::$statusTexts[$statusCode];
        if (env('APP_DEBUG')) {
              $error['message'] = $e->getMessage();
              $error['file'] = $e->getFile() . ':' . $e->getLine();
              $error['trace'] = explode("\n", $e->getTraceAsString());
        }

        return response()->json($error, $statusCode, [], JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
    }
}
