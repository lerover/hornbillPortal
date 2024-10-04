<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;

class ApplicationController extends Controller
{
    public function index()
    {
        $users = new User();
        $payments = Payment::all();
        $count = 0;
        foreach($payments as $payment){
            $count += $users->where('role','0')->where('id',$payment->user_id)->count();

        }
        return view('dashboard.admin.application',compact('users','count'));
    }
}
