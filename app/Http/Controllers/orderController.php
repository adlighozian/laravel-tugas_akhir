<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class orderController extends Controller
{
    public function index()
    {

        $data['title'] = 'Pemesanan makanan';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $categoryFilter = DB::table('menu')->orderBy('id', 'DESC')->get();
        $data['pertama'] = DB::table('menu')->orderBy('id', 'DESC')->first();
        $data['menu'] = $categoryFilter;
        $data['categories'] = DB::table('categories')->get();
        $data['sidebar'] = "pemesanan";
        return view('pages.pos.posPemesanan2', $data);
    }

    public function indext($kode_order)
    {
        $data['title'] = 'Pemesanan makanan';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $data['table_number'] = Order::whereKode_order($kode_order)->wherePayment_type('Waiting')->first()->table_number;
        $data['kode_order'] = $kode_order;
        $data['customer_name'] = Order::whereKode_order($kode_order)->wherePayment_type('Waiting')->first()->customer_name;
        $menu = DB::table('menu')->get();
        $categories = DB::table('categories')->get();
        $data['sidebar'] = "pemesanan";
        return view('pages.pos.posPemesanan2', $data, ['menu' => $menu, 'categories' => $categories]);
    }

    public function kitchenNote()
    {
        $data['sidebar'] = "kitchenote";
        $data['title'] = 'TA | Kitchen Note';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $data['orders'] = Order::whereIs_done(false)->get();
        foreach ($data['orders'] as $order) {
            $order['nama_menu'] = Menu::find($order->menu_id)->name;
        }
        return view('pages.pos.posKitchenNote', $data);
    }
    public function kitchenDone($order)
    {
        $date_now = date("Y-m-d");
        $data['title'] = 'TA | Kitchen Note';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        Order::find($order)->update(['is_done' => true]);
        Order::find($order)->update(['tanggal' => $date_now]);
        Order::find($order)->update(['status' => 0]);
        return redirect('/kitchenote');
    }

    public function confirmOrder($kode_order)
    {
        $data['title'] = 'TA | Confirm Order';
        $data['user'] = Auth::user();
        $data['sidebar'] = "pemesanan";
        $data['key'] = null;
        // $orders = Order::wherePayment_type('Waiting')->whereTable_number($table)->get();
        // $data['table_number'] = $table;
        // foreach ($orders as $order) {
        //     $order['menu_name'] = Menu::find($order->menu_id)->name;
        // }

        // $data['orders'] = $orders;
        $data['kode_order'] = $kode_order;
        $orders = Order::wherePayment_type('Waiting')->whereKode_order($kode_order)->get()->groupBy('menu_id');
        $data['table_number'] = Order::wherePayment_type('Waiting')->whereKode_order($kode_order)->first()->table_number;
        foreach ($orders as $order => $item) {
            $item->menu_name = Menu::find($order)->name;
            $item->total_order = $item->sum('total_order');
            $item->price_qty = Menu::find($order)->price;
            $item->total_price = $item->sum('total_price');
        }
        $data['orders'] = $orders;
        return view('pages.pos.posConfirmationOrder', $data);
    }

    public function checkRequest(Request $request)
    {
        $data['title'] = 'Konfirmasi pesanan';
        $data['sidebar'] = "pemesanan";
        $data['user'] = Auth::user();
        // dd($request);
        // Ambil request
        $attr = $request->all();
        $data['attr'] = $attr;
        $table_number = $attr['tableNumber'];
        $time = date('m/d/Y h:i:s');
        if ($request->kode_order) {
            $times = $request->kode_order;
        } else {
            $times =  str_replace([' ', '/', ':'], "", $time);
        }
        // insert ke tabel order
        for ($i = 0; $i < count($attr['food_id']); $i++) {
            $getFood = Menu::where('id', $attr['food_id'][$i])->get()->toArray()[0];
            if ($attr['total'][$attr['food_id'][$i]] !== '0') {
                $data['create'][$i] = Order::create([
                    'table_number' => $attr['tableNumber'],
                    'customer_name' => $attr['customerName'],
                    'menu_id' => $attr['food_id'][$i],
                    'total_order' => $attr['total'][$attr['food_id'][$i]],
                    'price_qty' => $getFood['price'],
                    'total_price' => $getFood['price'] * $attr['total'][$attr['food_id'][$i]],
                    'payment_type' => 'Waiting',
                    'is_done' => 0,
                    'kode_order' => $times,
                    'status_pembayaran' => 1,
                ]);
                $data['created'][$i] = ([
                    'table_number' => $attr['tableNumber'],
                    'customer_name' => $attr['customerName'],
                    'menu_id' => $attr['food_id'][$i],
                    'menu_name' => Menu::find($attr['food_id'][$i])->name,
                    'total_order' => $attr['total'][$attr['food_id'][$i]],
                    'price_qty' => $getFood['price'],
                    'total_price' => $getFood['price'] * $attr['total'][$attr['food_id'][$i]],
                    'payment_type' => 'Waiting',
                    'is_done' => 0,
                    'kode_order' => $times,
                    'status_pembayaran' => 1,
                ]);
                // dd($insert);
            }
        }

        $orders = Order::whereIs_done('0')->get();
        foreach ($orders as $order) {
            $order['menu_name'] = Menu::find($order->menu_id)->name;
        }
        $data['orders'] = $orders;

        // return redirect('/confirmOrder');
        return redirect()->route('confirmOrder', ['table' => $times]);
    }
    public function deleteOrder($kode_order)
    {
        $data['title'] = 'TA | Confirm Order';
        $data['user'] = Auth::user();
        $data['sidebar'] = "home";
        $data['key'] = null;
        $orders = Order::wherePayment_type('Waiting')->whereKode_order($kode_order);
        // dd($orders);
        $orders->delete();
        $data['msg'] = "Order berhasil dihapus";
        // return view('pages.pos.posConfirmationOrder', $data);
        return redirect('/pemesanan')->with('success', 'Order berhasil dihapus');
    }

    public function pdf($kode_order)
    {
        $data['orders'] = Order::where('kode_order', $kode_order)->get();
        $data['name'] = $data['orders'][0]->customer_name;
        $data['table_number'] = $data['orders'][0]->table_number;
        $data['date'] = date('l, d F Y', strtotime($data['orders'][0]->created_at));
        $data['total'] = Order::where('kode_order', $kode_order)->sum('total_price');
        // $pdf = PDF::loadView('pages.pdf.invoice', $data);
        $pdf = FacadePdf::loadView('pages.pdf.invoice', $data);
        return $pdf->stream('invoice.pdf');
    }
}
