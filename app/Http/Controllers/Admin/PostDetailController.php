<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class PostDetailController extends Controller
{
    public function index($id){
        $user = User::all()->where('id', $id);
        $posts = Job::all()->where('employer_id',$id);
        return view('dashboard.admin.post.postdetail',compact('posts','user'));
    }

    public function update(Request $request,$id){
        $post = Job::where('id',$id)->first();
        if($post->showhide_status === 'hide'){
            $post->update(['showhide_status'=>'show']);
            return redirect()->back();
        }else{
            $post->update(['showhide_status' => 'hide']);
            return redirect()->back();
        }
    }
}
