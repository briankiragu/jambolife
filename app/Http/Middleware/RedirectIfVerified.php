<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfVerified
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
        if (Auth::user()->is_active == false) {
            Auth::logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/auth/awaiting-verification');
        }
        return $next($request);
    }
}
