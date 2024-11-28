<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Rating;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->take(6)->get();
        $ratings = Rating::with('user')->where('rating', '>=', 4)->orderBy('created_at', 'desc')->take(10)->get();
        return view('frontend.beranda.index', compact(['projects', 'ratings']));
    }
}
