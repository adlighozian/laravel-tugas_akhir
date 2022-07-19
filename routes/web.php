<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\gudangController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\TransactionController;

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
    // KEUANGAN START
    Route::get('/kudashboard', [TransactionController::class, 'dashboard']);
    Route::get('/kutransaction', [TransactionController::class, 'index']);
    Route::get('/kuinput', [TransactionController::class, 'input']);
    Route::post('/kuinput/store', [TransactionController::class, 'store']);
    Route::get('/edit_user/{user}', [adminController::class, 'edit_user']);
    Route::post('/action_edit_user/{user}', [adminController::class, 'action_edit_user']);
    // KEUANGAN END
    // GUDANG START
    Route::get('/gdgdashboard', [gudangController::class, 'dashboard']);
    Route::get('/gdgdetail/{id}', [gudangController::class, 'detailBarang']);
    Route::get('/gdginput', [gudangController::class, 'input']);
    Route::get('/gdghistory', [gudangController::class, 'history']);
    Route::get('/gdghistory/detail/{date}', [gudangController::class, 'historyDetail']);
    Route::get('/gdginputkode', [gudangController::class, 'inputKode']);
    Route::get('/gdgstokhabis', [gudangController::class, 'stokHabis']);
    Route::get('/gdgstoksegera', [gudangController::class, 'stokSegera']);
    Route::post('/gdgdetail/masuk', [gudangController::class, 'masukBarang']);
    Route::post('/gdgdetail/keluar', [gudangController::class, 'keluarBarang']);
    Route::post('/gdgdashboard/delete', [gudangController::class, 'deleteBarang']);
    Route::post('/gdginputkode/delete', [gudangController::class, 'deleteKode']);
    Route::post('/gdginputkode', [gudangController::class, 'storeKode']);
    Route::post('/gdginput', [gudangController::class, 'storeBarang']);
    // GUDANG END
    // MENU START
    Route::get('/createmenu', [MenuController::class, 'createmenu']);

    Route::get('/updatemenu', [MenuController::class, 'updatemenu']);
    Route::get('/menueditor', [MenuController::class, 'index']);
    Route::get('/updatemenu/edit/{menu}', [MenuController::class, 'edit']);
    Route::get('/menueditor/hapus/{id}', [MenuController::class, 'hapus']);
    Route::post('/createmenu/store', [MenuController::class, 'store']);
    Route::post('/updatemenu/edit/{menu}/update', [MenuController::class, 'update']);
    //MENU END
    //CATEGORY START
    Route::get('/categoryeditor', [categoryController::class, 'index']);
    Route::post('/categoryeditor/store', [categoryController::class, 'store']);
    Route::get('/categoryeditor/hapus/{id}', [categoryController::class, 'hapus']);
    //CATEGORY END
    //ORDER START
    Route::get('/pemesanan', [orderController::class, 'index']);
    Route::get('/pemesanan/confirmation', [orderController::class, 'confirmationOrder']);
    //ORDER END
    //PAYMENT START
    Route::get('/listpayment', [paymentController::class, 'index']);
    Route::get('/listpayment/detailpayment', [paymentController::class, 'detailPayment']);
    //PAYMENT END
});
