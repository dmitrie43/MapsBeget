<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class Api extends Controller
{
    public function index()
    {
        $org = Organization::all();
        return view('api', compact('org'));
    }
}
