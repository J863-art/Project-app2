<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login'); // Redirect ke login jika user belum login
        }

        $user = Auth::user();
        if ($user->role != $role) {
            return redirect('/'); // Redirect ke halaman yang tidak memiliki akses
        }

        return $next($request);
    }
}
