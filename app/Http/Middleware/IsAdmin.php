<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah ID pengguna adalah 1 (admin)
        if (Auth::check() && Auth::user()->id === 6) {
            return $next($request);
        }

        // Jika bukan admin, redirect ke halaman utama
        return redirect('/dashboard')->with('error', 'You are not authorized to access this page.');
    }
}

