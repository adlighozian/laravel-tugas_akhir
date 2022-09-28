<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $data['title'] = 'TA | Home';
        $data['user'] = Auth::user();
        $data['sidebar'] = "home";
        $data['key'] = null;
        if (Auth::user()->role == 'keuangan') {
            return redirect('/kudashboard');
        } elseif (Auth::user()->role == 'pos') {
            return redirect('/pemesanan');
        } elseif (Auth::user()->role == 'gudang') {
            return redirect('/gdgdashboard');
        } elseif (Auth::user()->role == 'dapur') {
            return redirect('/kitchenote');
        } elseif (Auth::user()->role == 'admin') {
            return redirect('/admindashboard');
        }
        return view('home', $data);
    }

    // public function confirmOrder()
    // {
    //     $data['title'] = 'TA | Confirm Order';
    //     $data['user'] = Auth::user();
    //     $data['sidebar'] = "home";
    //     $data['key'] = null;
    //     $orders = Order::whereIs_done('0')->get();
    //     foreach($orders as $order){
    //         $order['menu_name'] = Menu::find($order->menu_id)->name;
    //     }
    //     $data['orders'] = $orders;
    //     return view('pages.pos.posConfirmationOrder', $data);
    // }

    // public function checkRequest(Request $request)
    // {
    //     $data['title'] = 'Konfirmasi pesanan';
    //     $data['user'] = Auth::user();
    //     // dd($request);
    //     // Ambil request
    //     $attr = $request->all();
    //     $data['attr'] = $attr;

    //     // insert ke tabel order
    //     for ($i = 0; $i < count($attr['food_id']); $i++) {
    //         $getFood = Menu::where('id', $attr['food_id'][$i])->get()->toArray()[0];
    //         if ($attr['total'][$attr['food_id'][$i]] !== '0') {
    //             $data['create'][$i]= Order::create([
    //                 'table_number' => $attr['tableNumber'],
    //                 'customer_name' => $attr['customerName'],
    //                 'menu_id' => $attr['food_id'][$i],
    //                 'total_order' => $attr['total'][$attr['food_id'][$i]],
    //                 'price_qty' => $getFood['price'],
    //                 'total_price' => $getFood['price']*$attr['total'][$attr['food_id'][$i]],
    //                 'payment_type' => 'Waiting',
    //                 'is_done' => 0,
    //             ]);
    //             $data['created'][$i]=([
    //                 'table_number' => $attr['tableNumber'],
    //                 'customer_name' => $attr['customerName'],
    //                 'menu_id' => $attr['food_id'][$i],
    //                 'menu_name' => Menu::find($attr['food_id'][$i])->name,
    //                 'total_order' => $attr['total'][$attr['food_id'][$i]],
    //                 'price_qty' => $getFood['price'],
    //                 'total_price' => $getFood['price']*$attr['total'][$attr['food_id'][$i]],
    //                 'payment_type' => 'Waiting',
    //                 'is_done' => 0,
    //             ]);
    //             // dd($insert);
    //         }
    //     }

    //     $orders = Order::whereIs_done('0')->get();
    //     foreach($orders as $order){
    //         $order['menu_name'] = Menu::find($order->menu_id)->name;
    //     }
    //     $data['orders'] = $orders;

    //     return redirect('/confirmOrder');

    // }
}
