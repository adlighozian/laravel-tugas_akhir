<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function dashboard()
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Input';
        return view('pages.kuDashboard', $data);
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
        return view('pages.kuTransaction', $data);
    }
    public function input()
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Input';
        return view('pages.kuInput', $data);
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
            $input['service'] = $request->nominal * 10 / 100;
            $input['income'] = $request->nominal - $input['pajak'] - $input['service'];
        }
        $input['bukti'] = $request->bukti;
        $input['keterangan'] = $request->keterangan;
        Transaction::create($input);
        // return view('pages.kuTransaction', $data);
        return redirect('/kutransaction');
    }
}
