<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): \Illuminate\View\View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): Response|JsonResponse|\Illuminate\Http\RedirectResponse
    {
        // --- NEW VERIFICATION LOGIC ---
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            
            if (! $user->hasVerifiedEmail()) {
                session()->put('verification_email', $user->email);
                session()->flash('auth_modal_form', 'verifyCode');
                throw ValidationException::withMessages([
                    'email' => 'Your account is not verified. Please enter the code we sent you.',
                ]);
            }
        }
        
        // --- END NEW LOGIC ---

        // User is verified, proceed with normal login.
        $request->authenticate();

        $request->session()->regenerate();
        if ($request->expectsJson()) {
            return response()->json([
                'redirect' => session()->pull('url.intended', RouteServiceProvider::HOME)
            ]);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}