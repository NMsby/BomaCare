<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DomesticworkerController extends Controller
{
    public function DomesticworkerDashboard(): View
    {
        return view('domesticworker.dashboard');
    }
}
