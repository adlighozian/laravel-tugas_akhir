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

    public function dashboard()
    {
        $data['user'] = Auth::user();
        $data['datakode'] = gdgBarang::all();
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Dashboard';
        $data['count'] = 1;
        $data['stok_mauhabis'] = DB::select("select A.* from gdg_barangs A inner join gdg_kodebarangs B
        on A.kodebarang_id = B.id
        where A.jumlah <= B.min_stok and A.jumlah != 0");
        $data['stok_habis'] = DB::table("gdg_barangs")->where("jumlah", 0)->get();
        return view('pages.gudang.gdgDashboard', $data);
    }

    public function input()
    {
        $data['user'] = Auth::user();
        $data['datakode'] = gdgKodebarang::all();
        $data['datakodes'] = gdgKodebarang::get();
        $data['sidebar'] = "gdginput";
        $data['title'] = 'TA | Gudang Input';
        return view('pages.gudang.gdgInput', $data);
    }

    public function history()
    {
        $data['user'] = Auth::user();
        $data['sidebar'] = "gdghistory";
        $data['title'] = 'TA | Gudang History;';
        return view('pages.gudang.gdgHistory', $data);
    }

    public function inputKode()
    {
        $data['user'] = Auth::user();
        $data['datakode'] = gdgKodebarang::all();
        $data['sidebar'] = "gdginputkode";
        $data['title'] = 'TA | Gudang Input Kode;';
        $data['count'] = 1;
        return view('pages.gudang.gdgKodeInput', $data);
    }

    public function detailBarang($id)
    {
        $data['user'] = Auth::user();
        $data['data'] = gdgBarang::find($id);
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Detail;';
        return view('pages.gudang.gdgDetail', $data);
    }

    public function stokHabis()
    {
        $data['user'] = Auth::user();
        $data['datakode'] = gdgBarang::all();
        $data['data'] = gdgBarang::get()->where("jumlah", 0);
        $data['stok_mauhabis'] = DB::select("select A.* from gdg_barangs A inner join gdg_kodebarangs B
        on A.kodebarang_id = B.id
        where A.jumlah <= B.min_stok and A.jumlah != 0");
        $data['count'] = 1;
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Dashboard;';
        return view('pages.gudang.gdgStokhabis', $data);
    }

    // GET END
    // POST START
    public function deleteKode(Request $id)
    {
        $dataKode = gdgKodebarang::find($id->kode_delete_id);
        $dataBarang = DB::table("gdg_barangs")->where("kodebarang_id", $id)->first();
        if ($dataBarang) {
            return redirect()->back()->with('error', 'Kode barang ini tidak dapat dihapus, karena masih terdapat barang yang menggunakan kode ini.');
        } else {
            $dataKode->delete();
            return redirect()->back()->with('success', 'Kode barang berhasil dihapus');
        }
    }

    public function deleteBarang(Request $id)
    {
        $dataKode = gdgBarang::find($id->kode_delete_id);
        $dataKode->delete();
        return redirect()->back()->with('success', 'Kode barang berhasil dihapus');
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
                'min_stok' => $request->min_stok,
                'satuan' => $request->satuan,
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
        return redirect()->back()->with('success', 'Barang berhasil dibuat');
    }

    // POST END
}
