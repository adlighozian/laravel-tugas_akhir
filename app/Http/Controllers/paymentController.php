<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
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
        
        foreach($orders as $order){
            
            foreach($order as $o){
                $order['customer_name'] = Order::whereTable_number($o->table_number)->first()->customer_name;
                $order['total_price'] = Order::whereTable_number($o->table_number)->sum('total_price');
                $order['status'] = Order::whereTable_number($o->table_number)->first()->payment_type;
                $order['table_number'] = Order::whereTable_number($o->table_number)->first()->table_number;
            }
            
        }
        // dd($orders);
        $data['orders'] = $orders;
        return view('pages.pos.posListPayment', $data );
    }
    public function detailPayment()
    {
        $data['title'] = 'List Pembayaran';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();       
        return view('pages.pos.posDetailPayment', $data );
    }
}
