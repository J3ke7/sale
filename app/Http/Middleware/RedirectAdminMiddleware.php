<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectAdminMiddleware
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
        if (Auth::user() && Auth::user()->is_admin) {
            return redirect('/admin/user');
        }

        return $next($request);
    }
}
