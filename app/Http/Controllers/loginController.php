<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class loginController extends Controller
{

    public function index()
    {
        return view('pages.login', [
            "title" => "TA | Login"
        ]);
    }

    public function authenticate (Request $request)
    {
         
    }

}
