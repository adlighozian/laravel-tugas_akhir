<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class paymentController extends Controller
{
    public function index()
    {
        $data['title'] = 'List Pembayaran';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();       
        return view('pages.posListPayment', $data );
    }
    public function detailPayment()
    {
        $data['title'] = 'List Pembayaran';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();       
        return view('pages.posDetailPayment', $data );
    }
}
