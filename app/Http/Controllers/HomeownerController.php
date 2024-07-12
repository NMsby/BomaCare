<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeownerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apply 'auth' middleware to all methods in this controller
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function showPayments()
    {
        return view('payments.payments');
    }
}
