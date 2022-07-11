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
        return view('home', $data);
    }

    public function checkRequest(Request $request)
    {
        $data['title'] = 'check';
        $data['user'] = Auth::user();
        $input = $request->all();
        // dd($request);
        // Ambil request
        $attr = $request->all();

        // insert ke tabel order
        for ($i = 0; $i < count($attr['food_id']); $i++) {
            $getFood = Menu::where('id', $attr['food_id'][$i])->get()->toArray()[0];
            if ($attr['total'][$attr['food_id'][$i]] !== '0') {
                $insert= Order::create([
                    'table_number' => $attr['tableNumber'],
                    'customer_name' => $attr['customerName'],
                    'menu_id' => $attr['food_id'][$i],
                    'total_order' => $attr['total'][$attr['food_id'][$i]],
                    'price_qty' => $getFood['price'],
                    'total_price' => 0,
                    'payment_type' => 'Waiting',
                    'is_done' => 0,
                ]);
                // dd($insert);
            }
        }
    }
}
