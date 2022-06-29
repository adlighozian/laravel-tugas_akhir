<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function user_manage()
    {
        $data['title'] = 'Manage User';
        $data['user'] = "admin";
        return view('pages/adminRegister', $data);
    }

}
