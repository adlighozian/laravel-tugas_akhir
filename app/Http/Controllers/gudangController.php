<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\gdgKodebarang;
use App\Models\gdgBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gudangController extends Controller
{
    // GET START

    public function index()
    {
        $data['user'] = Auth::user();
        $data['datakode'] = gdgBarang::all();
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Dashboard';
        $data['count'] = 1;
        return view('pages.gdgDashboard', $data);
    }

    public function input()
    {
        $data['user'] = Auth::user();
        $data['datakode'] = gdgKodebarang::all();
        $data['datakodes'] = gdgKodebarang::get();
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
        $data['count'] = 1;
        return view('pages.gdgKodeInput', $data);
    }

    public function detail($id)
    {
        $data['user'] = Auth::user();
        $data['data'] = gdgBarang::find($id);
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Detail;';
        return view('pages.gdgDetail', $data);
    }

    // GET END
    // POST START

    public function delete($id)
    {
        $dataKode = gdgKodebarang::find($id);
        $dataBarang = DB::table("gdg_barangs")->where("kodebarang_id", $id)->first();
        if ($dataBarang) {
            return redirect()->back()->with('error', 'Kode barang ini tidak dapat dihapus, karena masih terdapat barang yang menggunakan kode ini.');
        } else {
            $dataKode->delete();
            return redirect()->back()->with('success', 'Kode barang berhasil dihapus');
        }
    }

    public function storeKode(Request $request)
    {
        $data = gdgKodebarang::where('kode', $request->kode)
            ->first();
        if ($data) {
            return redirect()->back()->with('error', 'Kode Barang ini sudah tersedia');
        } else {
            gdgKodebarang::create([
                'kode' => $request->kode,
                'jenis' => $request->jenis,
                'keterangan' => $request->keterangan,
            ]);
            return redirect()->back()->with('success', 'Kode Barang berhasil dibuat');
        }
    }

    public function storeBarang(Request $request)
    {
        $validatedData = $request->validate([
            "kodebarang_id" => "required",
            "nama" => "required",
            "jumlah" => "required",
            "expired" => "required",
            "gambar" => "image|file",
            "catatan" => "",
        ]);
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gdgImages');
        }
        gdgBarang::create($validatedData);
        return redirect()->back()->with('success', ' ');
    }

    // POST END
}
