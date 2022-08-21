<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function index()
    {
        $data['title'] = 'TA | Home';
        $data['user'] = Auth::user();
        return view('pages.admin.adminDashboard', $data);
    }

    public function register()
    {
        $data['title'] = 'Register User';
        $data['user'] = Auth::user();;
        return view('pages.admin.adminRegister',$data);
    }

    public function action_register(Request $request)
    {
        $data['title'] = 'Manage User';
        $data['user'] = Auth::user();;
        return view('pages.admin.adminManageUser',$data);
    }

    public function manage_user()
    {
        $data['title'] = 'Manage User';
        $data['user'] = Auth::user();;
        $data['users'] = User::get();
        return view('pages.admin.adminManageUser', $data);
    }

    public function edit_user(User $user)
    {
        $data['title'] = 'Edit User';
        $data['user'] = Auth::user();;
        $data['euser'] = $user;
        return view('pages.admin.adminEditUser', $data);
    }

    public function action_edit_user(User $user, Request $request)
    {
        $data['title'] = 'Edit User';
        $data['user'] = Auth::user();;
        $data['euser'] = $user;

        $input['password'] = Hash::make($request->password);
        User::find($user->id)->update($input);

        return redirect('profile');
        return view('pages.admin.adminManageuser', $data);
    }

    public function store(Request $request)
    {
        User::create($request);
    }
}
