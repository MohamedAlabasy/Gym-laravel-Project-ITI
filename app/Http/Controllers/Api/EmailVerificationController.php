<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    use VerifiesEmails;

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {

            return response(['message' => 'Already verified ']);
        }
        $request->user()->sendEmailVerificationNotification();

        if ($request->wantsJson()) {
            return response(['message' => 'Email Sent']);
        }

        return back()->with('resent', true);
    }

    public function verify($user_id, Request $request)
    {
        if (!$request->hasValidSignature()) {
            return response()->json([
                'message' => 'You have no email',
            ], 201);
        }

        $user = User::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            $token = $user->createToken('GymProjectToken')->plainTextToken;
            $user->notify(new WelcomeEmailNotification($user));
            $user->update(['is_verifications' => 1]);
            return response()->json([
                'token' => $token,
                'message' => 'check your mail for greeting message'
            ], 201);
        };
    }
}
