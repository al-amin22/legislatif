<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
        // Mengedit method "handle" pada "AdminMiddleware"
        public function handle($request, Closure $next)
        {
            // Cek apakah pengguna telah login
            if (Auth::check()) {
                // Cek role pengguna
                if (Auth::user()->role == 0) {
                    // Jika role adalah 0 (admin), izinkan akses ke halaman admin
                    return $next($request);
                }
            }

            // Jika bukan admin, arahkan kembali ke halaman login
            return redirect()->route('login');
        }

}
