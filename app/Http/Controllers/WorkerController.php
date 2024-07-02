<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function form()
    {
        return view('worker.form');
    }

    public function save(Request $request)
    {
        // Validation and saving logic
        $validated = $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            // Add other fields and validation rules as needed
        ]);

        $worker = new Worker();
        $worker->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        $worker->name = $request->name;
        $worker->specialty = $request->specialty;
        // Set other fields as needed
        $worker->save();

        return redirect()->route('worker.list');
    }

    public function list()
    {
        $workers = Worker::all();
        return view('worker.list', compact('workers'));
    }

    public function showActions()
    {
        return view('worker.actions');
    }

    public function showJobs()
    {
        $jobs = Job::all(); // Assuming you have a Job model
        return view('worker.jobs', compact('jobs'));
    }

    public function showJobForm()
    {
        return view('worker.job_form');
    }

    public function saveJob(Request $request)
    {
        // Validation and saving logic for job
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add other fields and validation rules as needed
        ]);

        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        // Set other fields as needed
        $job->save();

        return redirect()->route('worker.jobs');
    }
}
