<?php

namespace App\Http\Controllers;

use App\Application;
use App\CandidateProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::where('candidate_id', Auth::user()->id)->paginate(5);
        return view('candidate.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidate.profile.create');
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
            'category' => 'required',
            'job_type' => 'required',
            'salary' => 'required',
            'county' => 'required',
            'town' => 'required',
        ]);

        $preferences = new CandidateProfile([
            'candidate_id' => Auth::user()->id,
            'category' => $request->get('category'),
            'type' => $request->get('job_type'),
            'salary' => $request->get('salary'),
            'county' => $request->get('county'),
            'town' => $request->get('town'),
        ]);

        $preferences->save();
        return redirect()->route('candidate.index')->with('success', 'Job Preferences added');
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
        $profile = CandidateProfile::where('candidate_id', $id)->first();
        if ($profile) {
            return view('candidate.profile.edit', compact('profile'));
        };
        return redirect()->route('candidate.create')->with('info', 'Profile not found. Create one here.');
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
            'category' => 'required',
            'job_type' => 'required',
            'salary' => 'required',
            'county' => 'required',
            'town' => 'required',
        ]);

        $profile = CandidateProfile::find($id);
        $profile->category = $request->get('category');
        $profile->type = $request->get('job_type');
        $profile->salary = $request->get('salary');
        $profile->county = $request->get('county');
        $profile->town = $request->get('town');

        $profile->save();
        return redirect()->route('candidate.index')->with('success', 'Job Preferences Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = CandidateProfile::find($id);
        $profile->delete();
        return redirect()->route('candidate.index')->with('success', 'Your job preferences have been Deleted.!');
    }
}
