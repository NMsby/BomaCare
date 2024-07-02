<?php
// app/Http/Controllers/RoleController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function select($role)
    {
        if ($role == 'homeowner') {
            return redirect()->route('homeowner.form');
        } elseif ($role == 'worker') {
            return redirect()->route('worker.form');
        } else {
            return redirect()->route('dashboard')->with('error', 'Invalid role selected.');
        }
    }
}
