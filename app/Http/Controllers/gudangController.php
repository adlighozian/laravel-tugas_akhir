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
        $data['title'] = 'TA | Gudang Dashboard';
        return view('pages.gdgDashboard', $data);
    }

    public function input(Request $request)
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Gudang Input';
        return view('pages.gdgInput', $data);
    }

    public function history()
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Gudang History;';
        return view('pages.gdgHistory', $data);
    }

    public function input_kode()
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Gudang Input Kode;';
        return view('pages.gdgKodeInput', $data);
    }
}
