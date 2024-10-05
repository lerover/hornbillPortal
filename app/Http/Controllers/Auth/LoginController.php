<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function redirectToRole($role)
    {
        if ($role == '2') {
            return redirect('/admin/index');
        } elseif ($role == '0') {
            return redirect('/employer/index');
        } else {
            return redirect('/newsfeed/home');
        }
    }

    public function login(Request $request): RedirectResponse
    {
        // Validate credentials
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'The email address must be a valid email format.',
            'password.required' => 'Please enter your password.',
        ]);

        // Attempt to log in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on user role
            $user = Auth::user();
            return $this->redirectToRole($user->role);
        }



        // Return with error if credentials do not match
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
