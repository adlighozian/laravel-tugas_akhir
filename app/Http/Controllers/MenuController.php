<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function createmenu()
    {
        $data['title'] = 'Update Menu';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();   
        return view('pages.posCreateMenu',$data);
    }

    public function updatemenu()
    {
        $data['title'] = 'Update Menu';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();      
        return view('pages.posUpdatemenu', $data);
    }
    public function index()
    {
        $data['title'] = 'Menu Editor';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();       
        return view('pages.posMenu', $data );
    }

}
