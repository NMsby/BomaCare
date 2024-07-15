<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class HomeownerController extends Controller
{
    // Homeowner Dashboard
    public function HomeownerDashboard(): View
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('homeowner.dashboard', compact('profileData'));
    }

    // Homeowner Profile Page
    public function HomeownerProfile(): View
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('homeowner.profile', compact('profileData'));
    }

    // Homeowner Profile Update
    public function HomeownerProfileUpdate(Request $request): RedirectResponse
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $profileData->update($request->all());
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    // Homeowner Update Password
    public function HomeownerUpdatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $id = Auth::user()->id;
        $profileData = User::find($id);

        if (Hash::check($request->old_password, $profileData->password)) {
            $profileData->update(['password' => Hash::make($request->password)]);
            return redirect()->back()->with('success', 'Password updated successfully');
        } else {
            return redirect()->back()->with('error', 'Old password does not match');
        }
    }

    // Homeowner Logout
    public function HomeownerLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('success', 'You have been logged out');
    }
}
