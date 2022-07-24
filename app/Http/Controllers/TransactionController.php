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
        $data['transactions'] = Transaction::get()->sortByDesc('tanggal');
        // $transs = DB::select(DB::raw("count(id) as 'data'"), DB::raw("DATE_FORMAT(tanggal, '%m-%Y') new_date"),  DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
        //     ->groupby('year', 'month')
        //     ->get();
        $transin = Transaction::select(
            // "id",
            DB::raw("(sum(income)) as total_income"),
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
        foreach ($data['transactions'] as $transaction) {
            if ($transaction->jenis == 'Pengeluaran') {
                $transaction->jumlah = $transaction->nominal;
            } else {
                $transaction->jumlah = $transaction->income;
            }
        }
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
    public function monthindexin($month)
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $data['transactions'] = Transaction::whereMonth('tanggal','=',$month)->whereJenis('Pemasukan')->get()->sortByDesc('tanggal');
        foreach ($data['transactions'] as $transaction) {
            if ($transaction->jenis == 'Pengeluaran') {
                $transaction->jumlah = $transaction->nominal;
            } else {
                $transaction->jumlah = $transaction->income;
            }
        }
        return view('pages.keuangan.kuTransaction', $data);
    }
    public function monthindexout($month)
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $data['transactions'] = Transaction::whereMonth('tanggal','=',$month)->whereJenis('Pengeluaran')->get()->sortByDesc('tanggal');
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
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $input['jenis'] = $request->jenis;
        $input['sumber'] = $request->sumber;
        $input['tanggal'] = $request->tanggal;
        $input['nominal'] = $request->nominal;
        if ($input['jenis'] == 'Pemasukan') {
            $input['pajak'] = $request->nominal * 10 / 100;
            // $input['service'] = $request->nominal * 10 / 100;
            $input['service'] = 0;
            $input['income'] = $request->nominal - $input['pajak'] - $input['service'];
        }
        $input['bukti'] = $request->bukti;
        $input['keterangan'] = $request->keterangan;
        Transaction::create($input);
        // return view('pages.kuTransaction', $data);
        return redirect('/kutransaction');
    }
    public function view(Transaction $transaction)
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | View Transaksi';
        $data['transaction'] = $transaction;

        return view('pages.keuangan.kuView', $data);
    }
}
