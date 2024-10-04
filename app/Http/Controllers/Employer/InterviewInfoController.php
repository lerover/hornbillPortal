<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterviewInfo;
use App\Models\Application;

class InterviewInfoController extends Controller
{
    public function store(Request $request,string $id)
    {
        $request->validate([
            'interviewinfo'=>'required',
        ]);

        InterviewInfo::create([
            'application_id' => $id,
            'description'=>$request->interviewinfo
        ]);

        return redirect()->back()->with('success','You\'ve sent interview info Successfully');
    }
}
