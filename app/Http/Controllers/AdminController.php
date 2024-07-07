<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    // Admin Dashboard
    public function AdminDashboard(): View
    {
        return view('admin.welcome');
    } // End Admin Dashboard

    // Admin Logout
    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    } // End Admin Logout

    // Admin Login
    public function AdminLogin(): View
    {
        return view('admin.auth.login');
    } // End Admin Login

    // Admin Profile
    public function AdminProfile(): View
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.profile.edit', compact('profileData'));
    } // End Admin Profile

    // Admin Profile Update
    public function AdminProfileUpdate(Request $request): RedirectResponse
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $profileData->first_name = $request->first_name;
        $profileData->last_name = $request->last_name;
        $profileData->phone_number = $request->phone_number;
        $profileData->address = $request->address;

        // Check if the request has a file
        if ($request->hasFile('photo_path')) {
            $file = $request->file('photo_path');
            $filename = date('YmdHis') . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profiles/admin/'), $filename);
            $profileData['photo_p'] = 'uploads/profiles/admin/' . $filename;
        } // End If (hasFile)

        $profileData->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    } // End Admin Profile Update
}
