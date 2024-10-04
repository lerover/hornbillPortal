<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class JobapplyController extends Controller
{
    public function store(Request $request,string $id){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'experience'=>'required',
            'salary'=>'required|numeric',
        ]);

        $user = auth()->user();
        Application::create([
            'job_id' => $id,
            'employee_id'=>$request->userid,
            'name'=>$request->name,
            'email'=>$request->email,
            'experience'=>$request->experience,
            'expected_salary'=>$request->salary
        ]);

        return redirect()->back()->with('message','Your application has been submitted');
    }

}
