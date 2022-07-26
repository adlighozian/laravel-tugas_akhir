<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class orderController extends Controller
{
    public function index()
    {
        $data['title'] = 'Pemesanan makanan';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $menu = DB::table('menu')->get();
        $categories = DB::table('categories')->get();
        return view('pages.pos.posPemesanan', $data, ['menu' => $menu, 'categories' => $categories]);
    }

    public function indext($table)
    {
        $data['title'] = 'Pemesanan makanan';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $data['table_number'] = $table;
        $data['customer_name'] = Order::whereTable_number($table)->wherePayment_type('Waiting')->first()->customer_name;
        $menu = DB::table('menu')->get();
        $categories = DB::table('categories')->get();
        return view('pages.pos.posPemesanan', $data, ['menu' => $menu, 'categories' => $categories]);
    }

    // public function confirmationOrder()
    // {
    //     $data['title'] = 'Konfirmasi Pesanan';
    //     $data['user'] = Auth::user();;
    //     $data['users'] = User::get();
    //     return view('pages.pos.posConfirmationOrder', $data);
    // }
    public function kitchenNote()
    {
        $data['title'] = 'TA | Kitchen Note';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $data['orders'] = Order::whereIs_done(false)->get();
        foreach($data['orders'] as $order){
            $order['nama_menu'] = Menu::find($order->menu_id)->name;
        }
        return view('pages.pos.posKitchenNote', $data);
    }
    public function kitchenDone($order)
    {
        $data['title'] = 'TA | Kitchen Note';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        $update = Order::find($order)->update(['is_done' => true]);
        return redirect('/kitchenote');
    }

    public function confirmOrder($table)
    {
        $data['title'] = 'TA | Confirm Order';
        $data['user'] = Auth::user();
        $data['sidebar'] = "home";
        $data['key'] = null;
        $orders = Order::wherePayment_type('Waiting')->whereTable_number($table)->get();
        $data['table_number'] = $table;
        foreach ($orders as $order) {
            $order['menu_name'] = Menu::find($order->menu_id)->name;
        }
        $data['orders'] = $orders;
        return view('pages.pos.posConfirmationOrder', $data);
    }

    public function checkRequest(Request $request)
    {
        $data['title'] = 'Konfirmasi pesanan';
        $data['user'] = Auth::user();
        // dd($request);
        // Ambil request
        $attr = $request->all();
        $data['attr'] = $attr;
        $table_number = $attr['tableNumber'];

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
        return redirect()->route('confirmOrder', ['table' => $table_number]);
    }
    public function deleteOrder($table)
    {
        $data['title'] = 'TA | Confirm Order';
        $data['user'] = Auth::user();
        $data['sidebar'] = "home";
        $data['key'] = null;
        $orders = Order::wherePayment_type('Waiting')->whereTable_number($table);
        // dd($orders);
        $orders->delete();
        $data['msg'] = "Order berhasil dihapus";
        // return view('pages.pos.posConfirmationOrder', $data);
        return redirect('/pemesanan')->with('success', 'Order berhasil dihapus');
    }
}
