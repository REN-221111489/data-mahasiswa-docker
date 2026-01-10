<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    public function index()
    {
        return 'Halo Operator: ' . Auth::user()->username;
    }
}
