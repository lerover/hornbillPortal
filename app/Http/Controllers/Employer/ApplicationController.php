<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return view('employer.application',compact('applications'));
    }

    public function update(Request $request,string $id){
        if($request->accept === '1'){
            Application::find($id)->update([
                'status'=>$request->accept
            ]);
        }elseif($request->reject === '2'){
            Application::find($id)->update([
                'status'=>$request->reject
            ]);
        };


        return redirect()->back();
    }

    public function destroy(string $id){
        Application::destroy($id);
        return redirect()->back();
    }
}
