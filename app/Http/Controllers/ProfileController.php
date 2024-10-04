<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $userid = Auth::user()->id;
        $applications = Application::where('employee_id',$userid)->get();
        $user = User::where('id',$userid)->first();
        return view('newsfeed.profile',compact('userid','applications','user'));
    }

    public function delete(string $id){
        Application::find($id)->delete();
        return redirect()->back();
    }
}
