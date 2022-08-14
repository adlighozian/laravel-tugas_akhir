<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\gdgKodebarang;
use App\Models\gdgBarang;
use App\Models\gdgLogbook;
use App\Models\gdgExpired;
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
        $data['gudang'] = gdgBarang::latest()->filter(request(['search']))->get();
        $data['stok_barang'] = gdgBarang::all();
        $data['stok_habis'] = gdgBarang::get()->where("jumlah", 0);
        $data['stok_tersedia'] = gdgBarang::get()->where("jumlah", ">", 0);
        $data['stok_segera'] = DB::select("SELECT A.* from gdg_barangs A inner join gdg_kodebarangs B
        on A.kodebarang_id = B.id where A.jumlah <= B.min_stok and A.jumlah != 0");
        $data['stok_segeratb'] = DB::select("SELECT A.*, B.jenis, B.min_stok, B.satuan from gdg_barangs A inner join gdg_kodebarangs B
        on A.kodebarang_id = B.id
        where A.jumlah <= B.min_stok and A.jumlah != 0");
        // $data['expired'] = gdgBarang::where("expired", "<=", NOW())->get();
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
        $data['expired'] = gdgExpired::where("barang_id", $id)->latest()->get();
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
        $date_now = date("Y-m-d");
        $request->validate([
            "kodebarang_id" => "required",
            "nama" => "required",
            "gambar" => "image|file",
            "catatan" => "",
            "jumlah" => "required",
            "expired" => ""
        ]);
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('gdgImages');
        } else {
            $gambar = null;
        }
        gdgBarang::insert([
            "kodebarang_id" => $request->kodebarang_id,
            "nama" => $request->nama,
            "gambar" => $gambar,
            "catatan" => $request->catatan,
            "jumlah" => $request->jumlah,
        ]);
        $stok_barang = gdgBarang::all();
        $barang_id = count($stok_barang);
        gdgExpired::insert([
            "barang_id" => $barang_id,
            "jumlah" =>  $request->jumlah,
            "expired" => $request->expired,
            "tanggal" => $date_now,
        ]);
        return redirect()->back()->with('success', 'Barang berhasil dibuat');
    }

    public function masukBarang(Request $request)
    {
        $date_now = date("Y-m-d");
        $request->validate([
            "jumlah_keluar" => "required",
        ]);
        $barang = gdgBarang::find($request->barang_id);
        $total = $barang->jumlah + $request->jumlah_keluar;
        gdgBarang::where("id", $request->barang_id)->update(["jumlah" => $total]);
        if ($request->expired) {
            $expired = $request->expired;
        } else {
            $expired = null;
        }
        gdgExpired::insert([
            "barang_id" => $request->barang_id,
            "jumlah" =>  $request->jumlah_keluar,
            "expired" => $expired,
            "tanggal" => $date_now,
        ]);
        $dateNow = date("Ym");
        $request->request->add(['tahun_bulan' => $dateNow]);
        gdgLogbook::create($request->all());
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan');
    }

    public function keluarBarang(Request $request)
    {
        $barang = gdgBarang::find($request->id);
        $dateNow = date("Ym");
        $request->validate([
            "nama" => "required",
            "jumlah_keluar" => "required",
            "status" => "required",
        ]);
        $request->request->add(['tahun_bulan' => $dateNow]);
        if ($request->jumlah >= $request->jumlah_keluar) {
            $total = $barang->jumlah - $request->jumlah_keluar;
            $total_expired = $request->jumlah - $request->jumlah_keluar;
            gdgLogbook::create($request->all());
            gdgBarang::where("id", $request->id)->update(["jumlah" => $total]);
            gdgExpired::where("id", $request->id_expired)->update(["jumlah" => $total_expired]);
            return redirect()->back()->with('success', 'Barang berhasil dikeluarkan');
        } else {
            return redirect()->back()->with('error', 'barang yang dikeluarkan tidak cukup');
        }
    }


    // POST END
}
