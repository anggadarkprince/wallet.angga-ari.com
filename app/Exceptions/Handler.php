<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
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
        // When we've got non-matched route resulting in "404 Not Found" response.
        if ($exception instanceof NotFoundHttpException) {
            $config = app('config');
            $defaultLocale = $config['app.locale'];
            $locale = $request->segment(1);

            // See if locale in url is absent or isn't among known languages.
            if (!in_array($locale, ['id', 'en'])) {
                // Redirect to same url with default locale prepended.
                $uri = $request->getUriForPath('/' . $defaultLocale . $request->getPathInfo());

                return redirect($uri, 301);
            }
        }

        return parent::render($request, $exception);
    }
}
