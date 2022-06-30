<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class gudangController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user();
        return view('pages.gdgDashboard', [
            "title" => "TA | Gudang Dashboard"
        ], $data);
    }

    public function input(Request $request)
    {
        $data['user'] = Auth::user();
        return view('pages.gdgInput', [
            "title" => "TA | Gudang Input"
        ], $data);
    }
}
