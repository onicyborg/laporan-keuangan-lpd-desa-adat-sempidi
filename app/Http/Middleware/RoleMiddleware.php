<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        // Periksa apakah pengguna telah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Periksa apakah pengguna memiliki peran yang diizinkan
        foreach ($levels as $level) {
            if (Auth::user()->level == $level) {
                return $next($request);
            }
        }

        // Jika tidak memiliki peran yang diizinkan, kembalikan respons larangan
        return abort(403, 'Unauthorized');
    }
}
