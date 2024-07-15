<?php

namespace App\Http\Controllers\Domesticworker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
//    // View all applications
//    public function index()
//    {
//        $applications = auth()->user()->applications()->latest()->get();
//        return view('domesticworker.applications.index');
//    }
//
//    // View a single application
//    public function show($id)
//    {
//        $application = auth()->user()->applications()->findOrFail($id);
//        return view('domesticworker.applications.show');
//    }
//
//    // Create a new application
//    public function create()
//    {
//        return view('domesticworker.applications.create');
//    }
//
//    // Store the application
//    public function store(Request $request)
//    {
//        $request->validate([
//            'title' => 'required',
//            'description' => 'required',
//        ]);
//
//        auth()->user()->applications()->create($request->all());
//
//        return redirect()->route('domesticworker.applications.index');
//    }
//
//    // Edit an application
//    public function edit($id)
//    {
//        $application = auth()->user()->applications()->findOrFail($id);
//        return view('domesticworker.applications.edit');
//    }
}
