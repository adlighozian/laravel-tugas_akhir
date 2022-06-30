<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\gudangController;

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

// LOGIN START
Route::get('/login', [loginController::class, 'index']);
Route::get('/logout', [loginController::class, 'logout']);
Route::post('/action_login', [loginController::class, 'authenticate']);
// LOGIN END

Route::group(['middleware' => ['user_login']], function () {
    //HOME START
    Route::get('/', [Controller::class, 'index']);
    //HOME END
    // ADMIN START
    Route::get('/admindashboard', [adminController::class, 'index']);
    Route::get('/adminregister', [adminController::class, 'register']);
    Route::get('/user_manage', [adminController::class, 'user_manage']);
    Route::get('/user_edit/{user}', [adminController::class, 'user_manage']);
    // ADMIN END
    // GUDANG START
    Route::get('/gdgdashboard', [gudangController::class, 'index']);
     Route::get('/gdginput', [gudangController::class, 'input']);
    // GUDANG END
    // Create Menu
    Route::get('/createMenu', [MenuController::class, 'createmenu']);
});



