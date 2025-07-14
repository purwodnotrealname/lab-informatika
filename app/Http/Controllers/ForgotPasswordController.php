<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\View;
use GuzzleHttp\Client;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
    
        $token = Str::random(64);
    
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    
        try {
            // Render Blade template to HTML
            $htmlBody = View::make('email.forgetPassword', ['token' => $token])->render();
    
            // Mailtrap API URL with Inbox ID
            $inboxId = env('MAILTRAP_INBOX_ID');
            $url = "https://sandbox.api.mailtrap.io/api/send/{$inboxId}";
    
            // Initialize Guzzle client
            $client = new Client();
    
            // Send POST request
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('MAILTRAP_API_KEY'),
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'from' => [
                        'email' => 'no-reply@wibawa.dev',
                        'name'  => 'Your App Name'
                    ],
                    'to' => [
                        [
                            'email' => $request->email,
                            'name'  => ''
                        ]
                    ],
                    'subject' => 'Reset Your Password',
                    'text' => 'Please reset your password by clicking the link below.',
                    'html' => $htmlBody
                ]
            ]);
    
            // Optional: Log response for debugging
            // \Log::info("Mailtrap response: " . $response->getBody());
    
        } catch (\Exception $e) {
            \Log::error("Mailtrap failed: " . $e->getMessage());
            return back()->withErrors(['email' => 'Failed to send reset email.']);
        }
    
        return back()->with('message', 'We have send your password reset link to your email!');
    }

    protected function buildResetEmailContent(string $token): string
    {
        return View::make('email.forgetPassword', ['token' => $token])->render();
    }

    public function showResetPasswordForm(Request $request)
    {
        // Get token from query string
        $token = $request->query('token');

        $passwordReset = DB::table('password_reset_tokens')
        ->where('token', $token)
        ->first();

        $email = $passwordReset ? $passwordReset->email : null;

        if (!$token) {
            return redirect()->route('password.request')->withErrors([
                'token' => 'Invalid or missing token.'
            ]);
        }

        if (!$email) {
            return redirect()->route('password.request')->withErrors([
                'token' => 'Invalid token or associated email not found.'
            ]);
        }

        return view('auth.forgetPasswordLink', [
            'token' => $token,
            'email' => $email,
        ]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}