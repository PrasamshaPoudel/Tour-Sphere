<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        // Clean the email input (remove extra spaces, convert to lowercase)
        $email = strtolower(trim($request->input('email')));
        
        // Check if user exists with this email
        $user = \App\Models\User::where('email', $email)->first();
        
        if (!$user) {
            return back()->withInput($request->only('email'))
                        ->withErrors(['email' => 'We can\'t find a user with that email address.']);
        }

        // Note: We're allowing password reset for unverified emails
        // If you want to require email verification, uncomment the lines below:
        // if (!$user->email_verified_at) {
        //     return back()->withInput($request->only('email'))
        //                 ->withErrors(['email' => 'Please verify your email address before requesting a password reset.']);
        // }

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            ['email' => $email]
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
