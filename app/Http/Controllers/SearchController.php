<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $results = Job::where('title', 'like', "%$search%")->get();

        return view('dashboard.admin.application', compact('results') );
    }
}
