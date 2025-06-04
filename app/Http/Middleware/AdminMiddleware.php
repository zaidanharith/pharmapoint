<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/masuk')->with('loginError', 'Silakan login terlebih dahulu.');
        }

        if (!Auth::user()->is_admin) {
            return redirect('/masuk')->with('loginError', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
