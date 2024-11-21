<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna terautentikasi dan memiliki role 'admin'
        if (!Auth::check() || Auth::user()->Role !== 'admin') {
            // Redirect ke halaman home jika pengguna bukan admin
            return redirect()->route('home')->withErrors(['message' => 'Akses ditolak.']);
        }

        return $next($request);
    }
}
