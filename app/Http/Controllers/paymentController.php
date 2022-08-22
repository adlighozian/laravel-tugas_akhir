<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class paymentController extends Controller
{
    public function index()
    {
        $data['sidebar'] = "listpayment";
        $data['title'] = 'List Pembayaran';
        $data['user'] = Auth::user();
        $data['users'] = User::get();
        $orders = Order::where("status_pembayaran", 1)->get()->groupBy('created_at');
        foreach ($orders as $order) {
            foreach ($order as $o) {
                $order['customer_name'] = Order::whereCreated_at($o->created_at)->first()->customer_name;
                $order['total_price'] = Order::whereCreated_at($o->created_at)->sum('total_price');
                $order['status'] = Order::whereCreated_at($o->created_at)->first()->payment_type;
                $order['table_number'] = Order::whereCreated_at($o->created_at)->first()->table_number;
                $order['id'] = Order::whereCreated_at($o->created_at)->first()->id;
            }
        }
        $order_berhasil = Order::where("status_pembayaran", 0)->get()->groupBy('created_at');
        foreach ($order_berhasil as $order) {
            foreach ($order as $o) {
                $order['customer_name'] = Order::whereCreated_at($o->created_at)->first()->customer_name;
                $order['total_price'] = Order::whereCreated_at($o->created_at)->sum('total_price');
                $order['status'] = Order::whereCreated_at($o->created_at)->first()->payment_type;
                $order['table_number'] = Order::whereCreated_at($o->created_at)->first()->table_number;
                $order['id'] = Order::whereCreated_at($o->created_at)->first()->id;
            }
        }
        $data['orders'] = $orders;
        $data['order_berhasil'] = $order_berhasil;
        return view('pages.pos.posListPayment', $data);
    }
    public function detailPayment($table)
    {
        $data['sidebar'] = "pemesanan";
        $data['title'] = 'List Pembayaran';
        $data['user'] = Auth::user();
        $data['users'] = User::get();
        $orders = Order::wherePayment_type('Waiting')->whereTable_number($table)->get()->groupBy('menu_id');
        $data['table_number'] = $table;
        foreach ($orders as $order => $item) {
            $item['menu_name'] = Menu::find($order)->name;
            $item['total_order'] = $item->sum('total_order');
            $item['price_qty'] = $item->sum('price_qty');
            $item['total_price'] = $item->sum('total_price');
        }
        $data['orders'] = $orders;
        // dd($orders);
        return view('pages.pos.posDetailPayment', $data);
    }
    public function actionPayment(Request $request)
    {
        $data['title'] = 'List Pembayaran';
        $data['user'] = Auth::user();
        $data['users'] = User::get();
        $input['payment_type'] = $request->payment_type;
        if($request->payment_type == "Cash"){
            $data['sidebar'] = "Kembalian";
            $data['table_number'] = $request->table_number;
            $data['subtotal'] = $request->subtotal;
            $orders = Order::wherePayment_type('Waiting')->whereTable_number($data['table_number'])->get()->groupBy('menu_id');
        foreach ($orders as $order => $item) {
            $item['menu_name'] = Menu::find($order)->name;
            $item['total_order'] = $item->sum('total_order');
            $item['price_qty'] = $item->sum('price_qty');
            $item['total_price'] = $item->sum('total_price');
        }
        $data['orders'] = $orders;
            return view('pages.pos.posKembalian', $data);
        }
        Order::whereTable_number($request->table_number)->update($input);
        Order::whereTable_number($request->table_number)->update(['status_pembayaran' => 0]);
        //INTEGRASI KEUANGAN
        $inputt['jenis'] = "Pemasukan";
        $inputt['sumber'] = "Pendapatan layanan (Revenue)";
        $mytime = Carbon::now()->toDateString();
        $inputt['tanggal'] = $mytime;
        $inputt['nominal'] = $request->subtotal;
        if ($inputt['jenis'] == 'Pemasukan') {
            $inputt['pajak'] = $request->subtotal * 10 / 100;
            // $inputt['service'] = 0;
            $inputt['income'] = $request->subtotal - $inputt['pajak'];
        }
        $inputt['keterangan'] = "Pemasukan transaksi kafe tanggal: " . $mytime;
        $insertedTransaction = Transaction::create($inputt);

        //AKUNTANSI
        //Make Accounting Journal input
        $jinput1['account_id'] = Account::whereName($inputt['sumber'])->first()->id;
        $jinput1['transaction_id'] = $insertedTransaction->id;
        if($inputt['jenis'] == 'Pemasukan'){
            $jinput1['debit'] = NULL;
            $jinput1['credit'] = $inputt['nominal'];
            $jinput1['tanggal'] = $inputt['tanggal'];
            //Modify cash account
            $jinput['account_id'] = 1;
            $jinput['transaction_id'] = $insertedTransaction->id;
            $jinput['debit'] = $inputt['nominal'];
            $jinput['credit'] = NULL;
            $jinput['tanggal'] = $inputt['tanggal'];
        }

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
            // $inputt['service'] = 0;
            $inputt['income'] = $request->subtotal - $inputt['pajak'];
        }
        $inputt['keterangan'] = $request->keterangan;
        Transaction::create($inputt);
        return redirect('/listpayment');
    }
}
