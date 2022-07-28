<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\gdgKodebarang;
use App\Models\gdgBarang;
use App\Models\gdgLogbook;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class gudangController extends Controller
{
    // GET START

    public function dashboard()
    {
        $date_now = date("Y-m-d");
        $data['date'] =  str_replace("-", "", $date_now);
        $data['user'] = Auth::user();
        $data['gudang'] = gdgBarang::latest()->filter()->get();
        $data['stok_barang'] = gdgBarang::all();
        $data['stok_habis'] = gdgBarang::get()->where("jumlah", 0);
        $data['stok_tersedia'] = gdgBarang::get()->where("jumlah", ">", 0);
        $data['stok_segera'] = DB::select("SELECT A.* from gdg_barangs A inner join gdg_kodebarangs B
        on A.kodebarang_id = B.id where A.jumlah <= B.min_stok and A.jumlah != 0");
        $data['stok_segeratb'] = DB::select("SELECT A.*, B.jenis, B.min_stok, B.satuan from gdg_barangs A inner join gdg_kodebarangs B
        on A.kodebarang_id = B.id
        where A.jumlah <= B.min_stok and A.jumlah != 0");
        $data['expired'] = gdgBarang::where("expired", "<=", NOW())->get();
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Dashboard';
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
        if (request("search")) {
            $date = str_replace("-", "", request("search"));
            $data['data'] = DB::select("SELECT tahun_bulan, count(id) as jumlah_transaksi FROM `gdg_logbooks` WHERE 1 AND tahun_bulan = " . $date . " group by  tahun_bulan");
        } else {
            $data['data'] = DB::select("SELECT  tahun_bulan, count(id) as jumlah_transaksi FROM `gdg_logbooks`  WHERE 1 group by  tahun_bulan ORDER BY tahun_bulan DESC");
        }
        $data['user'] = Auth::user();
        $data['count'] = 1;
        $data['sidebar'] = "gdghistory";
        $data['title'] = 'TA | Gudang History';
        return view('pages.gudang.gdgHistory', $data);
    }

    public function historyDetail($date)
    {
        if (request("search")) {
            $data_search = gdgLogbook::where("tahun_bulan", $date)->where('status', request('search'))->latest()->get();
        } else {
            $data_search = gdgLogbook::where("tahun_bulan", $date)->latest()->get();
        }
        $data['user'] = Auth::user();
        $data['data'] = $data_search;
        $data['date'] = gdgLogbook::where("tahun_bulan", $date)->first();
        $data['count'] = 1;
        $data['sidebar'] = "gdghistory";
        $data['title'] = 'TA | Gudang History';
        return view('pages.gudang.gdgHistoryDetail', $data);
    }

    public function inputKode()
    {
        $data['user'] = Auth::user();
        $data['datakode'] = gdgKodebarang::latest()->filter()->get();
        $data['sidebar'] = "gdginputkode";
        $data['title'] = 'TA | Gudang Input Kode';
        $data['count'] = 1;
        return view('pages.gudang.gdgKodeInput', $data);
    }

    public function detailBarang($id)
    {
        $date_now = date("Y-m-d");
        $data['user'] = Auth::user();
        $data['data'] = gdgBarang::find($id);
        $data['date'] =  str_replace("-", "", $date_now);
        $data['sidebar'] = "gdgdashboard";
        $data['title'] = 'TA | Gudang Detail';
        return view('pages.gudang.gdgDetail', $data);
    }

    // GET END
    // POST START
    public function updateExpired(Request $request)
    {
        if ($request->expired) {
            gdgBarang::where("id", $request->id)->update(["expired" => $request->expired]);
            return redirect()->back()->with('success', 'Expired berhasil diupdate');
        } else {
            return redirect()->back();
        }
    }
    public function deleteKode(Request $request)
    {
        $id_kode = $request->kode_delete_id;
        $dataKode = gdgKodebarang::find($id_kode);
        $dataBarang = gdgBarang::where("kodebarang_id", $id_kode)->first();
        if ($dataBarang) {
            return redirect()->back()->with('error', 'Jenis barang ini tidak dapat dihapus, karena masih terdapat barang yang menggunakan kode ini.');
        } else {
            $dataKode->delete();
            return redirect()->back()->with('success', 'Jenis barang berhasil dihapus');
        }
    }

    public function deleteBarang(Request $id)
    {
        $dataKode = gdgBarang::find($id->kode_delete_id);
        $dataKode->delete();
        return redirect()->back()->with('success', 'Jenis barang berhasil dihapus');
    }

    public function storeKode(Request $request)
    {
        $data = gdgKodebarang::where('jenis', $request->jenis)
            ->first();
        if ($data) {
            return redirect()->back()->with('error', 'Jenis Barang ini sudah tersedia');
        } else {
            $request->validate([
                "jenis" => "required",
                "min_stok" => "required",
                "satuan" => "required",
            ]);
            $request->request->add(['keterangan' => $request->keterangan]);
            gdgKodebarang::create($request->all());
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
