<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\gdgKodebarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gudangController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user();
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Dashboard';
        return view('pages.gdgDashboard', $data);
    }

    public function input(Request $request)
    {
        $data['user'] = Auth::user();
        $data['datakode'] = gdgKodebarang::all();
        $data['sidebar'] = "co";
        $data['title'] = 'TA | Gudang Input';
        return view('pages.gdgInput', $data);
    }

    public function history()
    {
        $data['user'] = Auth::user();
        $data['sidebar'] = "co";
        $data['title'] = 'TA | Gudang History;';
        return view('pages.gdgHistory', $data);
    }

    public function input_kode()
    {
        $data['user'] = Auth::user();
        $data['sidebar'] = "co";
        $data['title'] = 'TA | Gudang Input Kode;';
        $data['datakode'] = gdgKodebarang::all();
        return view('pages.gdgKodeInput', $data);
    }

    public function detail()
    {
        $data['user'] = Auth::user();
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Detail;';
        return view('pages.gdgDetail', $data);
    }

    public function store(Request $request)
    {
        $data = gdgKodebarang::where('kode', $request->kode)
            ->first();
        if ($data) {
            return redirect()->back()->withErrors('error');
        } else {
            gdgKodebarang::create([
                'kode' => $request->kode,
                'jenis' => $request->jenis,
                'keterangan' => $request->keterangan,
            ]);
            return redirect()->back()->with('message', 'The success message!');
        }
    }
}
