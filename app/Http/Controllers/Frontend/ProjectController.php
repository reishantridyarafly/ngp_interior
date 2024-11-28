<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(9);
        return view('frontend.project.index', compact('projects'));
    }

    public function detail($slug)
    {
        $project = Project::where('slug', $slug)->first();
        return view('frontend.project.detail', compact('project'));
    }
}
