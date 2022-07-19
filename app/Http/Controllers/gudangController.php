<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\gdgKodebarang;
use App\Models\gdgBarang;
use App\Models\gdgLogbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class gudangController extends Controller
{
    // GET START

    public function dashboard()
    {
        $gudang = gdgBarang::all();
        // dd($gudang);

        if (request("search")) {
            $gudang = gdgBarang::all()->where('nama', request('search'));
        }

        $data['user'] = Auth::user();
        $data['gudang'] = $gudang;
        $data['stok_barang'] = gdgBarang::all();
        $data['stok_habis'] = gdgBarang::get()->where("jumlah", 0);
        $data['stok_tersedia'] = gdgBarang::get()->where("jumlah", 0);
        $data['stok_segera'] = DB::select("select A.* from gdg_barangs A inner join gdg_kodebarangs B
        on A.kodebarang_id = B.id where A.jumlah <= B.min_stok and A.jumlah != 0");
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Dashboard';
        $data['count'] = 1;
        return view('pages.gudang.gdgDashboard', $data);
    }

    public function stokHabis()
    {
        $data['user'] = Auth::user();
        $data['stok_barang'] = gdgBarang::all();
        $data['stok_habis'] = gdgBarang::get()->where("jumlah", 0);
        $data['stok_segera'] = DB::select("select A.* from gdg_barangs A inner join gdg_kodebarangs B
        on A.kodebarang_id = B.id
        where A.jumlah <= B.min_stok and A.jumlah != 0");
        $data['count'] = 1;
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Dashboard;';
        return view('pages.gudang.gdgStokhabis', $data);
    }

    public function stokSegera()
    {
        $data['user'] = Auth::user();
        $data['stok_barang'] = gdgBarang::all();
        $data['stok_habis'] = gdgBarang::get()->where("jumlah", 0);
        $data['stok_segera'] = DB::select("select A.*,B.kode, B.jenis, B.min_stok, B.satuan from gdg_barangs A inner join gdg_kodebarangs B
        on A.kodebarang_id = B.id
        where A.jumlah <= B.min_stok and A.jumlah != 0");
        $data['count'] = 1;
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Dashboard';
        return view('pages.gudang.gdgStoksegera', $data);
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
        $data['data'] = DB::select("SELECT cast(created_at as date) as tanggal, tahun_bulan, count(id) as jumlah_transaksi FROM `gdg_logbooks` WHERE 1
        group by cast(created_at as date), tahun_bulan");
        $data['count'] = 1;
        $data['sidebar'] = "gdghistory";
        $data['title'] = 'TA | Gudang History';
        return view('pages.gudang.gdgHistory', $data);
    }

    public function historyDetail($date)
    {
        $data['user'] = Auth::user();
        $data['data'] = gdgLogbook::where("tahun_bulan", $date)->latest()->get();
        $data['date'] = gdgLogbook::where("tahun_bulan", $date)->first();
        // dd($data['date']);
        // $data['date'] = $date;
        $data['count'] = 1;
        $data['sidebar'] = "gdghistory";
        $data['title'] = 'TA | Gudang History';
        return view('pages.gudang.gdgHistoryDetail', $data);
    }

    public function inputKode()
    {
        $data['user'] = Auth::user();
        $data['datakode'] = gdgKodebarang::all();
        $data['sidebar'] = "gdginputkode";
        $data['title'] = 'TA | Gudang Input Kode';
        $data['count'] = 1;
        return view('pages.gudang.gdgKodeInput', $data);
    }

    public function detailBarang($id)
    {
        $data['user'] = Auth::user();
        $data['data'] = gdgBarang::find($id);
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Detail';
        return view('pages.gudang.gdgDetail', $data);
    }

    // GET END
    // POST START
    public function deleteKode(Request $request)
    {
        $id_kode = $request->kode_delete_id;
        $dataKode = gdgKodebarang::find($id_kode);
        $dataBarang = gdgBarang::where("kodebarang_id", $id_kode)->first();
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
            "expired" => "",
            "gambar" => "image|file",
            "catatan" => "",
        ]);
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gdgImages');
        }
        gdgBarang::create($validatedData);
        return redirect()->back()->with('success', 'Barang berhasil dibuat');
    }

    public function masukBarang(Request $request)
    {
        $barang = gdgBarang::find($request->id);
        $total = $barang->jumlah + $request->jumlah;
        $dateNow = date("Ym");
        // dd($dateNow);
        $request->validate([
            "nama" => "required",
            "jumlah" => "required",
            "status" => "required",
        ]);
        $request->request->add(['tahun_bulan' => $dateNow]);
        gdgLogbook::create($request->all());
        gdgBarang::where("id", $request->id)->update(["jumlah" => $total]);
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan');
    }

    public function keluarBarang(Request $request)
    {
        $barang = gdgBarang::find($request->id);
        $dateNow = date("Ym");
        $request->validate([
            "nama" => "required",
            "jumlah" => "required",
            "status" => "required",
        ]);
        $request->request->add(['tahun_bulan' => $dateNow]);
        if ($barang->jumlah >= $request->jumlah) {
            $total = $barang->jumlah - $request->jumlah;
            gdgLogbook::create($request->all());
            gdgBarang::where("id", $request->id)->update(["jumlah" => $total]);
            return redirect()->back()->with('success', 'Barang berhasil dikeluarkan');
        } else {
            return redirect()->back()->with('error', 'barang yang dikeluarkan tidak cukup');
        }
    }


    // POST END
}
