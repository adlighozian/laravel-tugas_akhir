<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function createmenu()
    {
        return view('pages.posCreateMenu', [
            "title" => "TA | Admin Create Menu"
        ]);
    }
}
