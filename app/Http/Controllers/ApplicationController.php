<?php

namespace App\Http\Controllers;

use App\Application;
use App\CandidateProfile;
use App\Jobs\UpdateCandidateAcceptance;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Post::where('status', 0)->get();
        $applications = Application::all();
        return view('candidate.applications.index', compact('jobs', 'applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'job' => 'required',
        ]);
        $application = new Application([
            'candidate_id' => Auth::user()->id,
            'job_id' => $request->get('job'),
        ]);
        $application->save();
        return redirect()->route('candidate.index')->with('success', 'Application sent.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'candidate' => 'required',
            'job' => 'required',
        ]);
        $application = Application::find($id);
        $application->status = 1;

        $application->save();

        // Update post status
        $job = Post::find($request->get('job'));
        $job->status = 1;
        $job->save();


        //send sms to candidate
        $candidate = CandidateProfile::where('candidate_id', $request->get('candidate'))->first();
        UpdateCandidateAcceptance::dispatch($candidate, $job);

        return redirect()->route('jobs.index')->with('success', 'Job Status Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Application::find($id);
        $application->delete();
        return redirect()->route('candidate.index')->with('success', 'Deleted job applications!');
    }
}
