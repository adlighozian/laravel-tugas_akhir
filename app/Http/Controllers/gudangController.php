<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gudangController extends Controller
{
    public function index()
    {
        return view('pages.gdgDashboard', [
            "title" => "TA | Gudang Dashboard"
        ]);
    }

    public function input()
    {
        return view('pages.gdgInput', [
            "title" => "TA | Gudang Input"
        ]);
    }
}
