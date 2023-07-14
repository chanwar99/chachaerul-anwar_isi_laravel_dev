<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleAdminMiddleware
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
        // Periksa apakah pengguna saat ini memiliki peran 1
        if ($request->user() && $request->user()->role == 1) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki peran 1, arahkan ke halaman lain atau berikan pesan error
        return redirect()->route('pages.home');
    }
}