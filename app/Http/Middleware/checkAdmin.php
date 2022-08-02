<?php

namespace App\Http\Middleware;
use App\Http\Controllers\Admin\Users\LoginController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         
        // if (Auth::check() && empty(Auth::user()->status == 1)) {
        //     return $next($request);
        // }
        // else {
            return $next($request);
        // }
        // abort(404);
    }
}
