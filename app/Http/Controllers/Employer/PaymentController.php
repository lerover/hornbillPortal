<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(){
        $employer = Auth::user();
        $payment = Payment::where('user_id','=',$employer->id)->first();
        return view('employer.payment.index',compact('employer','payment'));
    }

    public function store(Request $request){
        $request->validate([
            'transaction_number'=>'required|unique:payments,transaction_number|numeric'
        ]);

        if($request->image != null){
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();

            Payment::create([
                'user_id'=>Auth::id(),
                'image'=>$imageName,
                'transaction_number'=>$request->transaction_number
            ]);
        }else{
            Payment::create([
                'user_id'=>Auth::id(),
                'transaction_number'=>$request->transaction_number
            ]);
        }

        return redirect()->route('employer.payment.index')->with('success','You purchased the payment successfully');
    }
}
