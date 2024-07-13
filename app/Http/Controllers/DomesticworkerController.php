<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DomesticworkerController extends Controller
{
    // Domesticworker Dashboard
    public function DomesticworkerDashboard(): View
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('domesticworker.dashboard', compact('profileData'));
    }

    // Domesticworker Profile Page
    public function DomesticworkerProfile(): View
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('domesticworker.profile', compact('profileData'));
    }

    // Domesticworker Profile Update
    public function DomesticworkerProfileUpdate(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $profileData->update($request->all());
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    // Domesticworker Update Password
    public function DomesticworkerUpdatePassword(Request $request): \Illuminate\Http\RedirectResponse
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

    // Domesticworker Logout
    public function DomesticworkerLogout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('success', 'You have been logged out');
    }

}
