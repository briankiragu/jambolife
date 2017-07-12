<?php

namespace App\Http\Middleware;

use Closure;

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
        if (!Auth::user()->is_active) {
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/auth/awaiting-verification');
        }
        return $next($request);
    }
}
