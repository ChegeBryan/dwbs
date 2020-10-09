<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('employer_id', Auth::user()->id)->paginate(5);
        return view('employer.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employer.jobs.create');
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
            'title' => 'required',
            'category' => 'required',
            'job_type' => 'required',
            'salary' => 'required|min:1',
            'job_description' => 'required',
            'county' => 'required',
            'town' => 'required',
            'address' => 'required',
        ]);

        $job = new Job([
            'employer_id' => Auth::user()->id,
            'category' => $request->get('category'),
            'title' => $request->get('title'),
            'type' => $request->get('job_type'),
            'description' => $request->get('job_description'),
            'salary' => $request->get('salary'),
            'county' => $request->get('county'),
            'town' => $request->get('town'),
            'address' => $request->get('address'),
        ]);
        $job->save();
        return redirect()->route('jobs.create')->with('success', 'Job Posted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        return view('employer.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        return view('employer.jobs.edit', compact('job'));
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
            'title' => 'required',
            'category' => 'required',
            'job_type' => 'required',
            'salary' => 'required|min:1',
            'job_description' => 'required',
            'county' => 'required',
            'town' => 'required',
            'address' => 'required',
        ]);

        $job = Job::find($id);
        $job->title = $request->get('title');
        $job->category = $request->get('category');
        $job->type = $request->get('job_type');
        $job->description = $request->get('job_description');
        $job->salary = $request->get('salary');
        $job->county = $request->get('county');
        $job->town = $request->get('town');
        $job->address = $request->get('address');

        $job->save();
        return redirect()->route('jobs.index')->with('success', 'Job Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
