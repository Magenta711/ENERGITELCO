<?php

namespace App\Exceptions;

use App\error as modelError;
use App\Mail\reportBugs;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Mail;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {   
        if ($exception instanceof \App\Exceptions\UnauthorizedException) {
            return redirect('home')->with('success','No tienes acceso a esta página.');
        }
        if (env('APP_ENV') == 'production' && $exception->getMessage() != 'Unauthenticated.' && $exception->getMessage() != 'CSRF token mismatch.' && $exception->getMessage() != 'The given data was invalid.' && $exception->getMessage() != '') {
            $bug = modelError::create([
                'message' => $exception->getMessage(),
                'method' => request()->getMethod(),
                'url' => request()->getRequestUri(),
                'user_id' => auth()->user()->id ?? 0,
                'ip' => request()->getClientIp(),
                'code' => $exception->getCode() ? $exception->getCode() : 'N/A',
            ]);

            Mail::to('lealstbn1031@gmail.com','Esteban Leal')->queue(new reportBugs($bug));
        }

        return parent::render($request, $exception);
    }
}
