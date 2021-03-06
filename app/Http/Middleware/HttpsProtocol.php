<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class HttpsProtocol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (
            $request->header('x-forwarded-proto') <> 'https' &&
            !$request->secure() &&
            App::environment() === 'production'
        ) {
            // return redirect()->secure($request->getRequestUri());
            return redirect()->secure($request->getRequestUri(), 301);
        }

        return $next($request);
    }
}
