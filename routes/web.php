<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.login', [
        "title" => "TA | Login"
    ]);
});

// ADMIN START
Route::get('/admindashboard', function () {
    return view('pages.adminDashboard', [
        "title" => "TA | Admin Dashboard"
    ]);
});
Route::get('/adminregister', function () {
    return view('pages.adminRegister', [
        "title" => "TA | Admin Register"
    ]);
});
// ADMIN END
