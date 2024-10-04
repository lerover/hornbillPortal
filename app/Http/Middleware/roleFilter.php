<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class roleFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::all()->where('id', Auth::id())->first();
        if ($user->role == '2') {
            return redirect('/admin/index');
        } elseif($user->role == '0') {
            return redirect('/employer/index');
        }else{
            return redirect('/newsfeed/home');
        }

    }
}
