<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        return view('pages.pos.posPemesanan',$data, ['menu' => $menu, 'categories' =>$categories]);

    }

public function confirmationOrder()
    {
        $data['title'] = 'Konfirmasi Pesanan';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();       
        return view('pages.pos.posConfirmationOrder', $data );
    }
    public function kitchenNote()
    {
        $data['title'] = 'Konfirmasi Pesanan';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();       
        return view('pages.pos.posKitchenNote', $data );
    }
    
}
