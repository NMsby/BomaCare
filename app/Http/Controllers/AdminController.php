<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        return redirect('admin/login')->with('success', 'You have been logged out');
    } // End Admin Logout

    // Admin Login
    public function AdminLogin(): View
    {
        return view('admin.auth.login');
    } // End Admin Login

    // Admin Lock Screen
    public function AdminLockScreen(): View
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.auth.lockscreen', compact('profileData'));
    } // End Admin Lock Screen

    // Admin Unlock Screen
    public function AdminUnlockScreen(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        } else {
            $notification = array(
                'message' => 'Password does not match. Please try again.',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } // End Admin Unlock Screen

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
            @unlink(public_path($profileData->photo_path));
            $filename = date('YmdHis') . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profiles/admin/'), $filename);
            $profileData['photo_path'] = 'uploads/profiles/admin/' . $filename;
        } // End If (hasFile)

        // Save the $profileData
        $profileData->save();

        // Send notification to the admin with the updated profile
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Admin Profile Update

    // Admin Password View
    public function AdminPasswordView(Request $request): View
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.profile.partials.update-password', compact('profileData'));
    } // End Admin Password View

    // Admin Update Password
    public function AdminUpdatePassword(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            ]);

        // Match the old password with the current password
        if (!(Hash::check($request->get('old_password'), auth::user()->password))) {
            // Send notification to the admin with the updated profile
            $notification = array(
                'message' => 'Old Password does not match. Please try again.',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        } // End If (Hash::check)

        // Change the password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Admin Update Password

}
