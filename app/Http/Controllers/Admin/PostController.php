<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;

class PostController extends Controller
{
    public function index(){
        $users = User::all();
        $jobs = Job::all();
        return view('dashboard.admin.post.index',compact('users','jobs'));
    }
}
