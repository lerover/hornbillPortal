<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->search_data;
        $categories = Category::all();
        $posts = Job::where('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%') ->orWhereHas('category',function($category) use($search){
            $category->where('name','like','%'.$search.'%');
        })->get();
        return view('employer.post.post',compact('posts','categories'));
    }
}
