<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publicitController extends Controller
{
    public function index()
    {
        return view('Restaurant.publicit');
    }
}
