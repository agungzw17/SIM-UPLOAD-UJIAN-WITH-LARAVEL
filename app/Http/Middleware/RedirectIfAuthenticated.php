<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => '1'])) {
            return redirect('/dosen/create');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => '2'])) {
            return redirect('/dosen');
        }

        return $next($request);
    }
}
