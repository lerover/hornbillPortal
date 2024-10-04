<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $posts = Job::where('employer_id',$user)->get();
        $categories = Category::all();
        return view('employer.post.post',compact('categories','posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title'=>'required',
            'category'=>'required',
            'position'=>'required',
            'salary'=>'required|numeric',
        ]);

        Job::create([
            'title'=>$request->title,
            'employer_id'=>Auth::id(),
            'category_id'=>$request->category,
            'position'=>$request->position,
            'salary'=>$request->salary,
            'description'=>$request->description
        ]);

        return redirect()->back()->with('success','Job posted successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Job::find($id);
        $selectedcat = $post->category_id;
        $categories = Category::all();

        return view('employer.post.edit',compact('categories','post','selectedcat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'title'=>'required',
            'category'=>'required',
            'position'=>'required',
            'salary'=>'required|numeric'
        ]);

        Job::find($id)->update([
            'title'=>$request->title,
            'category_id'=>$request->category,
            'position'=>$request->position,
            'salary'=>$request->salary,
            'description'=>$request->description
        ]);

        return redirect('employer/post')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Job::destroy($id);
        return redirect()->back()->with('success','Post deleted successfully');
    }
}
