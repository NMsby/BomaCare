<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homeowner;
use Illuminate\Support\Facades\Log;

class HomeownerController extends Controller
{
    public function showForm()
    {
        return view('homeowner.form');
    }

    public function save(Request $request)
    {
        // Log the request data
        Log::info('Homeowner save request data: ', $request->all());

        // Validate the request
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string|max:10',
            'phone_number' => 'required|string|max:15',
            'id_number' => 'required|string|max:50',
        ]);

        // Save the data
        try {
            $homeowner = new Homeowner();
            $homeowner->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
            $homeowner->name = $request->name;
            $homeowner->location = $request->location;
            $homeowner->age = $request->age;
            $homeowner->gender = $request->gender;
            $homeowner->phone_number = $request->phone_number;
            $homeowner->id_number = $request->id_number;
            $homeowner->save();

            // Log the saved homeowner
            Log::info('Homeowner saved: ', $homeowner->toArray());

            return redirect()->route('homeowner.dashboard')->with('success', 'Homeowner profile saved successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error saving homeowner: ' . $e->getMessage());
            
            return redirect()->back()->withErrors('An error occurred while saving the profile. Please try again.');
        }
    }

    public function dashboard()
    {
        return view('homeowner.dashboard');
    }
}
