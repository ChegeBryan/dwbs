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
        $jobs = Job::latest()->take(5)->get();
        $all_jobs = Job::all()->count();
        return view('home', compact('jobs', 'all_jobs'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employerHome()
    {
        return view('employer.index');
    }

    /**
     * Show the all jobs.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jobs()
    {
        $jobs = Job::paginate(15);
        return view('jobs', compact('jobs'));
    }
}
