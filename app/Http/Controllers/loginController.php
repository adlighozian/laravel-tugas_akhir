<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class loginController extends Controller
{

    public function index()
    {
        return view('login', [
            "title" => "TA | Login",
            "key" => "login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
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

    public function forgot()
    {
        return view('forgot', [
            "title" => "TA | Forgot Password",
            "key" => "forgot"
        ]);
    }
    public function action_forgot(Request $request)
    {
        $mailData = [
            'title' => 'Mail from SIRKA Chawaa Cafe',
            'body' => 'This is for forgot password using smtp.'
        ];
        $mailData['token'] = mt_rand(10000, 99999);
        $input['remember_token'] = $mailData['token'];
        $email = $request->email;
        $checkUser = User::whereEmail($email)->first();
        if ($email == 'keuanganchawaacafe@gmail.com' || $email == 'gudangchawaacafe@gmail.com' || $email == 'poschawaacafe@gmail.com') {
            $update = User::find($checkUser->id)->update($input);
            $mailData['link'] = URL::to('/reset?token=' . $input['remember_token']);
            Mail::to($email)->send(new DemoMail($mailData));

            return redirect()->back()->with('success', 'Email berhasil dikirim, silahkan cek email anda');
        }

        return back()->withErrors([
            'email' => 'Email doesnt exist',
        ])->onlyInput('email');
    }

    public function reset()
    {
        $data['title'] = 'TA | Reset Password';
        $data['key'] = 'reset';
        $token = $_GET['token'];
        $checkUser = User::whereRememberToken($token)->first();
        if (!$checkUser) {
            return abort(404);
        }
        $data['email'] = $checkUser->email;

        // dd($checkUser);
        return view('reset', $data);
    }

    public function action_reset(Request $request)
    {
        $data['title'] = 'TA | Reset Password';
        $data['key'] = 'reset';
        $email = $request->email;
        $checkUser = User::whereEmail($email)->first();
        if (!$checkUser) {
            return abort(404);
        }
        $data['email'] = $email;

        $input['remember_token'] = null;
        $input['password'] = Hash::make($request->password);
        $update = User::find($checkUser->id)->update($input);

        return redirect('/login');
    }
}
