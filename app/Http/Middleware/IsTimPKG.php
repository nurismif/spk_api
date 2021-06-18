<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsTimPKG
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
        if (Auth::user() && Auth::user()->jabatan == User::TIM_PKG_ROLE) {
            return $next($request);
        }
        return redirect()->route('dashboard');
    }
}
