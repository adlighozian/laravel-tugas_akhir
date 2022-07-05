<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class orderController extends Controller
{
    public function index()
    {
        $data['title'] = 'Pemesanan makanan';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();       
        return view('pages.posPemesanan', $data );
    }

}
