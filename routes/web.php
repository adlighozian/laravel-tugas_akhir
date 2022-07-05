<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\gudangController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\orderController;
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
    Route::get('/manage_user', [adminController::class, 'manage_user']);
    Route::get('/edit_user/{user}', [adminController::class, 'edit_user']);
    Route::post('/action_edit_user/{user}', [adminController::class, 'action_edit_user']);
    // ADMIN END
    // GUDANG START
    Route::get('/gdgdashboard', [gudangController::class, 'index']);
    Route::get('/gdgdetail', [gudangController::class, 'detail']);
    Route::get('/gdginput', [gudangController::class, 'input']);
    Route::get('/gdghistory', [gudangController::class, 'history']);
    Route::get('/gdginputkode', [gudangController::class, 'input_kode']);
    Route::post('/gdginputkode', [gudangController::class, 'store']);
    Route::get('/gdginputkode/delete/{id}', [gudangController::class, 'delete']);
    // GUDANG END
    // MENU START
    Route::get('/createmenu', [MenuController::class, 'createmenu']);

    Route::get('/updatemenu', [MenuController::class, 'updatemenu']);
    Route::get('/menueditor', [MenuController::class, 'index']);

    Route::get('/menueditor/hapus/{id}', [MenuController::class, 'hapus']);
    Route::post('/createmenu/store', [MenuController::class, 'store']);
    //MENU END
    //CATEGORY START
    Route::get('/categoryeditor', [categoryController::class, 'index']);
    Route::post('/categoryeditor/store', [categoryController::class, 'store']);
    Route::get('/categoryeditor/hapus/{id}', [categoryController::class, 'hapus']);
    //CATEGORY END
    //ORDER START
    Route::get('/pemesanan', [orderController::class, 'index']);
    //ORDER END
});
