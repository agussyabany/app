<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionExpiry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::check() && !Auth::viaRemember()) {
        //     // Check if the user is authenticated but the session is not via "remember me"
        //     if (time() - session('last_activity_time', 0) > config('session.lifetime') * 60) {
        //         // Session has expired
        //         Auth::logout();
        //         $request->session()->invalidate();
        //         $request->session()->regenerateToken();

        //         return redirect()->route('login');
        //     }

        //     // Update the last activity time for the user
        //     session(['last_activity_time' => time()]);
        // }
        return $next($request);
    }
}
