<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomesticworkerController extends Controller
{
    public function DomesticworkerDashboard()
    {
        return view('domesticworker.dashboard');
    }
}
