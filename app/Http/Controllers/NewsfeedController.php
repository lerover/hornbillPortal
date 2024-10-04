<?php

namespace App\Http\Controllers;

use App\Models\Job;

use Illuminate\Http\Request;

class NewsfeedController extends Controller
{
    public function index(){
        $posts = Job::all();
        return view('newsfeed/home',compact('posts'));
    }
}
