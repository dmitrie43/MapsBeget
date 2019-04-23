<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        return view('primary');
    }

    public function getTeachers()
    {
        return view('teachers');
    }
}
