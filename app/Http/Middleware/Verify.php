<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Verify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->email === null) {
                return $next($request);
            } elseif (Auth::user()->email_verified_at) {
                return $next($request);
            } else
                return redirect('email/verify');
        } else
            return redirect()->route('/login');

    }
}
