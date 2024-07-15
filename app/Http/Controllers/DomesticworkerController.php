<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DomesticworkerController extends Controller
{
    public function show(Request $request): User
    {
        // return back the user and associated domesticworker model
        $user = $request->user();
        $user->load('domesticworker');

        return $user;
    }

    public function update(Request $request)
    {
        // update the domesticworker model
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|numeric|min:10',
            'address' => 'required|string',

            'nationalID' => 'numeric|required_without:passportNo',
            'passportNo' => 'string|required_without:nationalID',
            'workPermit' => 'required|mime:pdf|max:2048',
            'backgroundCheck' => 'required|mime:pdf|max:2048',
            'medicalCheck' => 'required|mime:pdf|max:2048',
        ]);

        $user = $request->user();

        $user->update($request->only([
            'first_name',
            'last_name',
            'email',
            'phone_number',
            'address',
        ]));

        // Create or Update a driver associated with this user
        $user->domesticworker()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only([
                'nationalID',
                'passportNo',
                'workPermit',
                'backgroundCheck',
                'medicalCheck',
            ])
        );

        $user->load('domesticworker');

        return $user;
    }
}
