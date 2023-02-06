<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        // check : klw rolenya admin dan user yang login bukan admin (403) || check : jadi rolenya itu harusnya untuk user
        // namun yg login itu admin (403)
        if (($role == 'admin' && !$user->is_admin) || ($role == 'user' && $user->is_admin)) {
            abort(403);
        }
        return $next($request);
    }
}
