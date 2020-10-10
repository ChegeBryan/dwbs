<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Job::where('status', 'Open')->latest()->take(5)->get();
        $all_jobs = Job::where('status', 'Open')->count();
        return view('home', compact('jobs', 'all_jobs'));
    }

    /**
     * Show the all jobs.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jobs()
    {
        $jobs = Job::where('status', 'Open')->paginate(10);
        $all_jobs = Job::where('status', 'Open')->count();
        return view('jobs', compact('jobs', 'all_jobs'));
    }
}
