<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admindashboard');
        }

        return back()->withErrors([
            'email' => 'Email or password doesnt match',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
