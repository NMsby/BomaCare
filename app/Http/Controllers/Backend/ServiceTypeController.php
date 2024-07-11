<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceTypeController extends Controller
{
    // Service Type Index
    public function index(): View
    {
        $serviceTypes = ServiceType::latest()->get();
        return view('backend.service-type.index', compact('serviceTypes'));
    } // End of Service Type Index

    // Service Type Create
    public function create(): View
    {
        return view('backend.service-type.create');
    } // End of Service Type Create

    // Service Type Store
    public function store(Request $request)
    {

    }
}
