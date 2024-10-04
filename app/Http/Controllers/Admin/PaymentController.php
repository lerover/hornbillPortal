<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $user = User::all();
        $payments = Payment::all();
        return view('dashboard.admin.payment.index', compact('payments', 'user'));
    }

    public function update(string $id){
        $payment = Payment::where('id',$id)->first();
        if($payment->status === 'pending'){
            $payment->update(['status'=>'approve']);
            return redirect()->back();
        }
    }

    public function search(Request $request){
        $user = User::all();
        $search = $request->paymentsearch;
        $payments = Payment::where('transaction_number','like','%'.$search.'%')->orWhereHas('user',function($user) use($search){
            $user->where('name','like','%'.$search.'%');
        })->get();
        return view('dashboard.admin.payment.index', compact('payments', 'user'));
    }
}
