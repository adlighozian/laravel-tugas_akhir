<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
{
    public function index()
    {
        return view('pages.adminDashboard', [
            "title" => "TA | Home"
        ]);
    }

    public function register()
    {
        return view('pages.adminRegister', [
            "title" => "TA | Admin Register"
        ]);
    }

    public function store(Request $request)
    {
        User::create($request);
    }
}
