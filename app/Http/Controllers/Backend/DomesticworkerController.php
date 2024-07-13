<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DomesticworkerController extends Controller
{
    // Domestic Worker Index
    public function index()
    {
        return view('backend.domesticworker.index');
    } // End of Domestic Worker Index

    // Domestic Worker Create
    public function create()
    {
        return view('backend.domesticworker.create');
    } // End of Domestic Worker Create

    // Domestic Worker Store
    public function store(Request $request)
    {
        $request->validate([
            'domesticworker_name' => 'required|string|max:200',
            'domesticworker_email' => 'required|email|unique:domesticworkers|max:255',
            'domesticworker_phone' => 'required|numeric|unique:domesticworkers|min:0',
            'domesticworker_address' => 'required|string|max:255',
            'domesticworker_image' => 'required|max:2048',
        ]);

        $imagePath = '';

        // Check if image is uploaded
        if ($request->hasFile('domesticworker_image')) {
            $image = $request->file('domesticworker_image');
            $imageName = date('YmdHis') . '-' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/domesticworkers/'), $imageName);
            $imagePath = 'uploads/domesticworkers/' . $imageName;
        }

        // Insert Domestic Worker into Database
        Domesticworker::create([
            'domesticworker_name' => $request['domesticworker_name'],
            'domesticworker_email' => $request['domesticworker_email'],
            'domesticworker_phone' => $request['domesticworker_phone'],
            'domesticworker_address' => $request['domesticworker_address'],
            'domesticworker_image' => $imagePath,
        ]);

        // Notification
        $notification = array(
            'message' => 'Domestic Worker Created Successfully',
            'alert-type' => 'success'
        );

        // Redirect to Domestic Worker Index
        return redirect()->route('admin.domesticworker.index')->with($notification);
    } // End of Domestic Worker Store

    // Domestic Worker Edit
    public function edit($id)
    {
        $domesticworker = Domesticworker::findOrFail($id);
        return view('backend.domesticworker.edit', compact('domesticworker'));
    } // End of Domestic Worker Edit

    // Domestic Worker Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'domesticworker_name' => 'required|string|max:200',
            'domesticworker_email' => 'required|email|max:255',
            'domesticworker_phone' => 'required|numeric|min:0',
            'domesticworker_address' => 'required|string|max:255',
            'domesticworker_image' => 'max:2048',
        ]);

        $imagePath = '';

        // Check if image is uploaded
        if ($request->hasFile('domesticworker_image')) {
            $image = $request->file('domesticworker_image');
            $imageName = date('YmdHis') . '-' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/domesticworkers/'), $imageName);
            $imagePath = 'uploads/domesticworkers/' . $imageName;
        }

        // Update Domestic Worker into Database
        $domesticworker = Domesticworker::findOrFail($id);
        $domesticworker->update([
            'domesticworker_name' => $request['domesticworker_name'],
            'domesticworker_email' => $request['domesticworker_email'],
            'domesticworker_phone' => $request['domesticworker_phone'],
            'domesticworker_address' => $request['domesticworker_address'],
            'domesticworker_image' => $imagePath,
        ]);

        // Notification
        $notification = array(
            'message' => 'Domestic Worker Updated Successfully',
            'alert-type' => 'success'
        );

        // Redirect to Domestic Worker Index
        return redirect()->route('admin.domesticworker.index')->with($notification);
    } // End of Domestic Worker Update

    // Domestic Worker Delete
    public function destroy($id)
    {
        $domesticworker = Domesticworker::findOrFail($id);
        $domesticworker->delete();

        // Notification
        $notification = array(
            'message' => 'Domestic Worker Deleted Successfully',
            'alert-type' => 'success'
        );

        // Redirect to Domestic Worker Index
        return redirect()->route('admin.domesticworker.index')->with($notification);
    } // End of Domestic Worker Delete
}
