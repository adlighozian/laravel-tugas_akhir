<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class paymentController extends Controller
{
    public function index()
    {
        $data['title'] = 'List Pembayaran';
        $data['user'] = Auth::user();
        $data['users'] = User::get();
        $orders = Order::wherePayment_type("Waiting")->get()->groupBy('table_number');

        foreach ($orders as $order) {

            foreach ($order as $o) {
                $order['customer_name'] = Order::whereTable_number($o->table_number)->first()->customer_name;
                $order['total_price'] = Order::whereTable_number($o->table_number)->sum('total_price');
                $order['status'] = Order::whereTable_number($o->table_number)->first()->payment_type;
                $order['table_number'] = Order::whereTable_number($o->table_number)->first()->table_number;
            }
        }
        // dd($orders);
        $data['orders'] = $orders;
        return view('pages.pos.posListPayment', $data);
    }
    public function detailPayment($table)
    {
        $data['title'] = 'List Pembayaran';
        $data['user'] = Auth::user();
        $data['users'] = User::get();
        $orders = Order::wherePayment_type('Waiting')->whereTable_number($table)->get();
        $data['table_number'] = $table;
        foreach ($orders as $order) {
            $order['menu_name'] = Menu::find($order->menu_id)->name;
        }
        $data['orders'] = $orders;
        return view('pages.pos.posDetailPayment', $data);
    }
    public function actionPayment(Request $request)
    {
        $data['title'] = 'List Pembayaran';
        $data['user'] = Auth::user();
        $data['users'] = User::get();
        $table_number = $request->table_number;
        $input['payment_type'] = $request->payment_type;
        $update = Order::whereTable_number($table_number)->update($input);
        //INTEGRASI KEUANGAN
        $inputt['jenis'] = "Pemasukan";
        $inputt['sumber'] = $request->payment_type;
        $mytime = Carbon::now()->toDateString();
        $inputt['tanggal'] = $mytime;
        $inputt['nominal'] = $request->subtotal;
        if ($inputt['jenis'] == 'Pemasukan') {
            $inputt['pajak'] = $request->subtotal * 10 / 100;
            $inputt['service'] = 0;
            $inputt['income'] = $request->subtotal - $inputt['pajak'] - $inputt['service'];
        }
        $inputt['keterangan'] = "Pemasukan transaksi kafe tanggal: " . $mytime;
        Transaction::create($inputt);
        return redirect('/listpayment');
    }

    public function store(Request $request)
    {
        // $data['user'] = Auth::user();
        // $data['title'] = 'TA | Keuangan Transaksi';
        $inputt['jenis'] = "Pemasukan";
        $inputt['sumber'] = $request->payment_type;
        $mytime = Carbon::now()->toDateString();
        $inputt['tanggal'] = $mytime;
        $inputt['nominal'] = $request->subtotal;
        if ($inputt['jenis'] == 'Pemasukan') {
            $inputt['pajak'] = $request->subtotal * 10 / 100;
            $inputt['service'] = 0;
            $inputt['income'] = $request->subtotal - $inputt['pajak'] - $inputt['service'];
        }
        $inputt['keterangan'] = $request->keterangan;
        Transaction::create($inputt);
        return redirect('/listpayment');
    }
}
