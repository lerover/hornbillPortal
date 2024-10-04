<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class UsersearchController extends Controller
{
    public function search(Request $request){
        $users = User::where('name','like','%'.$request->usersearch.'%')->orWhere('email','like','%'.$request->usersearch.'%')->orWhere('role','like','%'.$request->usersearch.'%')->get();
        return view('dashboard.admin.user.index', compact( 'users'));
    }
}
