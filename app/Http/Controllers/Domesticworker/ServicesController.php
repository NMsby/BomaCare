<?php

namespace App\Http\Controllers\Domesticworker;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    // Services Index
    public function index()
    {
        $services = ServiceType::latest()->get();
        return view('domesticworker.services.index', compact('services'));
    }

    // View Service Details
    public function view($id)
    {
        $service = ServiceType::findOrFail($id);
        return view('domesticworker.services.view', compact('service'));
    }
}
