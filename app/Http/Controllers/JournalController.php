<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    //
    public function indexb()
    {
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $data['journals'] = Journal::get()->sortBy('account_id')->groupBy('account_id');

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

    public function history()
    {
        $data['sidebar'] = "kujournal";
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $data['journals'] = Journal::get()->reverse();
        foreach ($data['journals'] as $journal) {
            $journal['account'] = Account::find($journal->account_id)->name;
        }
        return view('pages.keuangan.kuJournalHistory', $data);
    }

    public function index()
    {
        $data['sidebar'] = "kujournal";
        $data['user'] = Auth::user();
        $data['title'] = 'TA | Keuangan Transaksi';
        $data['journals'] = Journal::get()->sortBy('account_id')->groupBy('account_id');

        foreach ($data['journals'] as $journal => $item) {
            $item['account'] = Account::find($journal)->name;
            $item['credit'] = $item->sum('credit');
            $item['debit'] = $item->sum('debit');

            if ($item['debit'] >= $item['credit']) {
                $item['debit'] = $item->sum('debit') - $item->sum('credit');
                $item['credit'] = 0;
            } else {
                $item['credit'] = $item->sum('credit') - $item->sum('debit');
                $item['debit'] = 0;
            }
        }
        return view('pages.keuangan.kuJournal', $data);
    }
}
