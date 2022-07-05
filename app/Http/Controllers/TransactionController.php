<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Dashboard';
        $data['transactions'] = Transaction::get()->sortByDesc('tanggal');
        foreach($data['transactions'] as $transaction){
            if($transaction->jenis == 'Pengeluaran'){
                $transaction->jumlah = $transaction->nominal;
            }
            else{
                $transaction->jumlah = $transaction->income;
            }
        }
        return view('pages.kuTransaction', $data);
    }
}
