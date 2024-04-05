<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($request->is('api/*') || $request->is('staff/*') || $request->is('customer/*') || $request->is('dealer/*') || $request->is('servicepartner/*') || $request->is('auction-inquiry-generation/*')){
            if ($exception instanceof ModelNotFoundException ) {
            
                return response()->json([
                    'status' => false,
                    'message' => 'Resource item not found.'
                ], 404);           
            }
        
            if ($exception instanceof NotFoundHttpException ) {
                return response()->json([
                    'status' => false,
                    'message' => 'Resource not found.'
                ], 404);
            }
        
            if ($exception instanceof MethodNotAllowedHttpException ) {
                return response()->json([
                    'status' => false,
                    'message' => 'Method not allowed.'
                ], 405);
            }
        } else {
            return parent::render($request, $exception);
        }
        
        
    }
}
