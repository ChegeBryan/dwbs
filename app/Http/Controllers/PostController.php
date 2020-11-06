<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Post::where('employer_id', Auth::user()->id)->paginate(5);
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

        $job = new Post([
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
        return redirect()->route('jobs.create')->with('success', 'Job ' . ucfirst($job->title) . ' Posted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Post::find($id);
        return view('employer.jobs.show', compact('job'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showJobToCandidate($id)
    {
        $job = Post::find($id);
        return view('candidate.job', compact('job'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Post::find($id);
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

        $job = Post::find($id);
        $job->title = $request->get('title');
        $job->category = $request->get('category');
        $job->type = $request->get('job_type');
        $job->description = $request->get('job_description');
        $job->salary = $request->get('salary');
        $job->county = $request->get('county');
        $job->town = $request->get('town');
        $job->address = $request->get('address');

        $job->save();
        return redirect()->route('jobs.index')->with('success', 'Updated ' . ucfirst($job->title) . ' job!');
    }

    /**
     * Update job status
     *
     * @param int $id
     *
     */
    public function updatePostStatus($id)
    {
        $job = Post::find($id);
        $job->status = 1;
        $job->save();

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
        $job = Post::find($id);
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Deleted ' . ucfirst($job->title) . ' job!');
    }
}
