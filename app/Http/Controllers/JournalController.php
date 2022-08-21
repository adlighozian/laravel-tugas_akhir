<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    //
    public function index()
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $data['journals'] = Journal::get()->sortByDesc('tanggal')->groupBy('account_id');
        
        foreach ($data['journals'] as $journal => $item) {
            $item['account'] = Account::find($journal)->name;
            $item['credit'] = $item->sum('credit');
            $item['debit'] = $item->sum('debit');
            // dd($item);
            // foreach($item as $j){
            //     $item['credit'] = $j->sum('credit');
            //     $item['debit'] = $j->sum('debit');
            // }
        }
        // dd($data['journals']);
        return view('pages.keuangan.kuJournal', $data);
    }
}
