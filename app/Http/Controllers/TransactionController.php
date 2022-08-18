<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function dashboard()
    {
        $data['current_year'] = Carbon::now()->year;
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        // $data['transactions'] = Transaction::get()->sortByDesc('tanggal');
        // $transs = DB::select(DB::raw("count(id) as 'data'"), DB::raw("DATE_FORMAT(tanggal, '%m-%Y') new_date"),  DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
        //     ->groupby('year', 'month')
        //     ->get();
        $transin = Transaction::select(
            // "id",
            DB::raw("(sum(income)) as total_income"),
            DB::raw("(sum(pajak)) as total_pajak"),
            DB::raw("(DATE_FORMAT(tanggal, '%m-%Y')) as month_year")
        )
            ->whereJenis('Pemasukan')
            ->orderBy('tanggal', 'DESC')
            ->groupBy(DB::raw("DATE_FORMAT(tanggal, '%m-%Y')"))
            ->get();
        $transout = Transaction::select(
            // "id",
            DB::raw("(sum(nominal)) as total_nominal"),
            DB::raw("(DATE_FORMAT(tanggal, '%m-%Y')) as month_year")
        )
            ->whereJenis('Pengeluaran')
            ->orderBy('tanggal', 'DESC')
            ->groupBy(DB::raw("DATE_FORMAT(tanggal, '%m-%Y')"))
            ->get();

        // dd($transin);
        $data['transin'] = $transin;
        $data['transout'] = $transout;
        // foreach ($data['transactions'] as $transaction) {
        //     if ($transaction->jenis == 'Pengeluaran') {
        //         $transaction->jumlah = $transaction->nominal;
        //     } else {
        //         $transaction->jumlah = $transaction->income;
        //     }
        // }
        return view('pages.keuangan.kuDashboard', $data);
    }

    public function index()
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $data['transactions'] = Transaction::get()->sortByDesc('tanggal');
        foreach ($data['transactions'] as $transaction) {
            if ($transaction->jenis == 'Pengeluaran') {
                $transaction->jumlah = $transaction->nominal;
            } else {
                $transaction->jumlah = $transaction->income;
            }
        }
        return view('pages.keuangan.kuTransaction', $data);
    }
    public function monthindexin($month_year)
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $month = explode('-', $month_year)['0'];
        $year = explode('-', $month_year)['1'];
        $data['transin'] = Transaction::whereMonth('tanggal','=',$month)->whereYear('tanggal','=',$year)->whereJenis('Pemasukan')->get()->sortByDesc('tanggal')->groupBy('tanggal');
        $data['transout'] = Transaction::whereMonth('tanggal','=',$month)->whereYear('tanggal','=',$year)->whereJenis('Pengeluaran')->get()->sortByDesc('tanggal')->groupBy('tanggal');
        foreach ($data['transin'] as $transaction) {
            foreach ($transaction as $tharian){
                if ($tharian->jenis == 'Pengeluaran') {
                    $tharian->jumlah = $tharian->nominal;
                } else {
                    $tharian->jumlah = $tharian->income;
                }
            }
            $transaction->daysum = $transaction->sum('jumlah');
            $transaction->total_pajak = $transaction->sum('pajak');
        }
        foreach ($data['transout'] as $transaction) {
            foreach ($transaction as $tharian){
                if ($tharian->jenis == 'Pengeluaran') {
                    $tharian->jumlah = $tharian->nominal;
                } else {
                    $tharian->jumlah = $tharian->income;
                }
            }
            $transaction->daysum = $transaction->sum('jumlah');
        }
        // dd($data['transactions']);
        // $data['transin'] = $data['transactions'];
        return view('pages.keuangan.kuMonth', $data);

        // return view('pages.keuangan.kuTransaction', $data);
    }
    public function monthindexout($month_year)
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $month = explode('-', $month_year)['0'];
        $year = explode('-', $month_year)['1'];
        $data['transactions'] = Transaction::whereMonth('tanggal','=',$month)->whereYear('tanggal','=',$year)->whereJenis('Pengeluaran')->get()->sortByDesc('tanggal');
        foreach ($data['transactions'] as $transaction) {
            if ($transaction->jenis == 'Pengeluaran') {
                $transaction->jumlah = $transaction->nominal;
            } else {
                $transaction->jumlah = $transaction->income;
            }
        }
        return view('pages.keuangan.kuTransaction', $data);
    }
    public function dayindexin($date)
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $tanggal = date('Y-m-d', $date);
        // dd($tanggal);
        $data['transactions'] = Transaction::whereTanggal($tanggal)->whereJenis('Pemasukan')->get()->sortByDesc('tanggal');
        foreach ($data['transactions'] as $transaction) {
            if ($transaction->jenis == 'Pengeluaran') {
                $transaction->jumlah = $transaction->nominal;
            } else {
                $transaction->jumlah = $transaction->income;
            }
        }
        return view('pages.keuangan.kuTransaction', $data);
    }
    public function dayindexout($date)
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $tanggal = date('Y-m-d', $date);
        // dd($tanggal);
        $data['transactions'] = Transaction::whereTanggal($tanggal)->whereJenis('Pengeluaran')->get()->sortByDesc('tanggal');
        foreach ($data['transactions'] as $transaction) {
            if ($transaction->jenis == 'Pengeluaran') {
                $transaction->jumlah = $transaction->nominal;
            } else {
                $transaction->jumlah = $transaction->income;
            }
        }
        return view('pages.keuangan.kuTransaction', $data);
    }
    public function kusearch(Request $request)
    {
        // dd($request->month);
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $time = strtotime($request->month);
        $date = date('d-m-Y H:i:s', $time);
        // dd($date);
        $month = date('m', $time);
        $year = date('Y', $time);
        $data['transactions'] = Transaction::whereMonth('tanggal','=',$month)->whereYear('tanggal','=',$year)->get()->sortByDesc('tanggal');
        foreach ($data['transactions'] as $transaction) {
            if ($transaction->jenis == 'Pengeluaran') {
                $transaction->jumlah = $transaction->nominal;
            } else {
                $transaction->jumlah = $transaction->income;
            }
        }
        return view('pages.keuangan.kuTransaction', $data);
    }
    public function input()
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Input';
        return view('pages.keuangan.kuInput', $data);
    }
    public function store(Request $request)
    {
        // ddd($request);
        // return $request->file('bukti')->store('bukti');
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $validatedData = $request->validate([
            "jenis" => "required",
            "sumber" => "required",
            "tanggal" => "required",
            "nominal" => "required",
            "bukti" => "image|file",
            "keterangan" => "",
        ]);
        // $input['jenis'] = $request->jenis;
        // $input['sumber'] = $request->sumber;
        // $input['tanggal'] = $request->tanggal;
        // $input['nominal'] = $request->nominal;
        // $input['bukti'] = $request->bukti;   
        // $input['keterangan'] = $request->keterangan;
        if ($validatedData['jenis'] == 'Pemasukan') {
            $validatedData['pajak'] = $request->nominal * 10 / 100;
            $validatedData['service'] = 0;
            $validatedData['income'] = $request->nominal - $validatedData['pajak'] - $validatedData['service'];
        }
        if ($request->file('bukti')) {
            $validatedData['bukti'] = $request->file('bukti')->store('kuGambar');
        }
        Transaction::create($validatedData);
        // return redirect()->back()->with('success', 'Transaksi berhasil dibuat');
        return redirect('/kutransaction')->with('success', 'Transaksi berhasil dibuat');
    }
    public function view(Transaction $transaction)
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | View Transaksi';
        $data['transaction'] = $transaction;

        return view('pages.keuangan.kuView', $data);
    }
}
