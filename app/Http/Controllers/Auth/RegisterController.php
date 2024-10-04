<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function employerRegister()
    {
        return view('auth.register');
    }

    public function employerRegisterPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => Carbon::now(),
            'role' => '0',
        ]);

        $profile = Profile::create([
           'user_id' => $users->id,
            'website' => $request->website,
        ]);

        Auth::login($users, $remember = true);

        return redirect()->route('home')->with('success', 'You have been registered successfully');
    }

    public function employeeRegister()
    {
        return view('auth.signup');
    }

    public function employeeRegisterPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => Carbon::now(),
            'role' => '1',
        ]);

        $profile = Profile::create([
            'user_id' => $users->id,

        ]);

        Auth::login($users, $remember = true);

        return redirect()->route('newsfeed.home')->with('success', 'You have been registered successfully');
    }
}
