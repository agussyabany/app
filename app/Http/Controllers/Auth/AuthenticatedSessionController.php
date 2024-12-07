<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();

            if (Auth::user()->hasRole('admin')) {
                return redirect('/utama');
            }

            if (Auth::user()->hasRole('aset')) {
                return redirect()->to('/aset.dashboard');
            }
            if (Auth::user()->hasRole('diklat')) {
                return redirect()->to('/diklat.dashboard');
            }

            if (Auth::user()->hasRole('soc')) {
                return redirect()->to('/soc.dashboard');
            }

            if (Auth::user()->hasRole('LiveLine')) {
                return redirect()->to('/ll.dashboard');
            }

            return redirect()->intended(RouteServiceProvider::HOME);
        } catch (\Illuminate\Auth\AuthenticationException $e) {
            // Authentication failed
            return redirect()->route('login')->with('error', 'Invalid username or password');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
