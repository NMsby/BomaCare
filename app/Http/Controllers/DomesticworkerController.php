<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DomesticworkerController extends Controller
{
    public function DomesticworkerDashboard(): View
    {
        $worker = Worker::where('user_id', auth()->id())->first();
        $jobs = $worker ? $worker->jobs()->paginate(5) : collect();
        return view('domesticworker.dashboard', compact('jobs'));
    }

    public function createJob()
    {
        return view('domesticworker.create-job');
    }

    public function storeJob(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);

        $worker = Worker::where('user_id', auth()->id())->firstOrFail();

        $job = new WorkerJob();
        $job->worker_id = $worker->id;
        $job->title = $request->title;
        $job->description = $request->description;

        if ($request->hasFile('document')) {
            $path = $request->file('document')->store('job_documents', 'public');
            $job->document_path = $path;
        }

        $job->save();

        return redirect()->route('domesticworker.dashboard')->with('success', 'Job created successfully');
    }
}