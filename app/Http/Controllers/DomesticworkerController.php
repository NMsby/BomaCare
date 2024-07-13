<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DomesticworkerController extends Controller
{
    public function DomesticworkerDashboard(): View
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('domesticworker.dashboard', compact('profileData'));
    }
}
