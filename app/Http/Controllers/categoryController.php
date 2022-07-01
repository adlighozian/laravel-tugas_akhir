<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    public function index()
    {
        $data['title'] = 'Category';
        $data['user'] = Auth::user();     
        return view('pages.posCategory', $data );
    }
}
