<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationCodeController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function verify(Request $request)
    {
        $email = session('verification_email');

        if (!$email) {
            return response()->json([
                'message' => 'Your session has expired. Please try logging in again.'
            ], 422);
        }
        
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json([ 'message' => 'User not found.' ], 404);
        }

        if ($user->hasVerifiedEmail()) {
            session()->forget('verification_email'); // Clean up session
            return response()->json([ 'message' => 'This account is already verified.' ], 422);
        }

        if (now()->gt($user->verification_code_expires_at)) {
            return response()->json([ 'message' => 'Your code has expired. Please request a new one.' ], 422);
        }

        if ($user->verification_code !== $request->input('code')) {
            return response()->json([ 'message' => 'The verification code is incorrect.' ], 422);
        }

        // Success
        $user->markEmailAsVerified();
        $user->verification_code = null;
        $user->verification_code_expires_at = null;
        $user->save();
        
        Auth::login($user); // Log the user in
        
        session()->forget('verification_email');

        return response()->json([ 'message' => 'Email successfully verified.' ], 200);
    }

    /**
     * Resend the email verification notification.
     */
    public function resend(Request $request)
    {
        $email = session('verification_email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }
        
        if ($user->hasVerifiedEmail()) {
             return response()->json(['message' => 'Email already verified.'], 400);
        }
        
        $user->sendEmailVerificationNotification();

        return response()->json(['message' => 'A new verification code has been sent.']);
    }
}